<?php

namespace App\Http\Controllers\admin\manajer;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManajerRequest;
use App\Http\Requests\UpdateManajerRequest;
use App\Repositories\Manajer\ManajerInterface;
use Illuminate\Validation\ValidationException;

class ManajerController extends Controller
{
    private $manajerRepository;

    public function __construct(ManajerInterface $manajerRepository)
    {
        $this->manajerRepository = $manajerRepository;
    }

    public function index()
    {
        $head = User::where('role', 'manajer');
        $manajer = User::where('role', 'manajer')->withCount('pegawai')->get()->map(function ($user) {
            $user->pegawai_count = $user->pegawai_count ?? 0;
            return $user;
        });

        return view('admin.cabang.index', [
            'data' => $head,
            'pegawai' => $manajer,
            'title' => 'data manajer'
        ]);
    }

    public function update(UpdateManajerRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $this->manajerRepository->update($id, $data);

            return redirect()->route('/cabang/data')->with('success', 'berhasil mengupdate data cabang');
        } catch (Exception $e) {
            return redirect()->route('/cabang/data')->with('eror', 'terjadi kesalahan');
        }
    }

    public function store(StoreManajerRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);
            $this->manajerRepository->store($data);

            return redirect()->route('cabang.index')->with('success', 'Berhasil menambah cabang');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambah cabang: ' . $e->getMessage());
        }
    }




    public function destroy(User $user, $id)
    {
        // dd($id);
        $user = User::where('user_id', $id)->update([
            'user_deleted' => auth()->user()->user_id,
            'deleted' => true
        ]);

        if ($user) {
            User::find($id)->delete();
        }

        return redirect()->route('cabang.index')->with('toast_success', 'sukses menghapus data');
    }

    public function look()
    {

        $pegawai = User::with('pegawai')->where('role', 'manajer')->get();

        // dd($pegawai);

        return view('admin.cabang.read');
    }
}
