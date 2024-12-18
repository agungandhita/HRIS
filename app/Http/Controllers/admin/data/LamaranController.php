<?php

namespace App\Http\Controllers\admin\data;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Models\Vacancy;

class LamaranController extends Controller
{

    private $lamaranRepository;

    public function __construct(Lamaran $lamaran)
    {
        $this->lamaranRepository = $lamaran;
    }

    public function index(Request $request)
    {
        $data = JobApplication::with(['lamaran', 'vacancy'])
            ->when($request->filled('nama_lengkap'), function ($query) use ($request) {
                return $query->whereHas('lamaran', function ($q) use ($request) {
                    $q->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
                });
            })
            ->when($request->filled('cabang'), function ($query) use ($request) {
                return $query->whereHas('vacancy', function ($q) use ($request) {
                    $q->where('cabang', $request->cabang);
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                return $query->where('status', $request->status);
            })
            ->get();

            // dd($data);
        $cabangList = Vacancy::distinct()->pluck('cabang');

        return view('admin.lamaran.index', [
            'data' => $data,
            'lamaran' => Lamaran::all(),
            'vacancy' => Vacancy::all(),
            'cabangList' => $cabangList,
        ]);
    }


    public function detail($id)
    {
        $lamaran = JobApplication::with('lamaran')->findOrFail($id);
        // dd($lamaran);

        return view('admin.lamaran.detail', [
            'data' => $lamaran,
            'lamaran' => Lamaran::all(),
        ]);
    }

    public function update(UpdateJobApplicationRequest $request, $id)
    {
        $lamaran = $request->validated();

        $lamaran = JobApplication::findOrFail($id);

        $lamaran->status = $request->status;
        $lamaran->save();

        return redirect()->route('lamaran.index', $id)->with('success', 'Status berhasil diperbarui.');
    }
}
