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

    public function __construct(Lamaran $lamaran) {
        $this->lamaranRepository = $lamaran;
    }

    public function index() {

        $lamaran = JobApplication::with('lamaran', 'vacancy')->get();
        // dd($lamaran);

        return view('admin.lamaran.index', [
            'data' => $lamaran,
            'lamaran' => Lamaran::all(),
            'vacancy' => Vacancy::all()

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

    public function update(UpdateJobApplicationRequest $request, $id) {
        $lamaran = $request->validated();

        $lamaran = JobApplication::findOrFail($id);

        $lamaran->status = $request->status;
        $lamaran->save();

        return redirect()->route('lamaran.index', $id)->with('success', 'Status berhasil diperbarui.');

    }
}
