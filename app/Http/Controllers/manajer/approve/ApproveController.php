<?php

namespace App\Http\Controllers\manajer\approve;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\PengajuanStatusNotification;
use App\Repositories\Pengajuan\PengajuanRepository;

class ApproveController extends Controller
{
    protected $pengajuanRepository;

    public function __construct(PengajuanRepository $pengajuanRepository)
    {
        $this->pengajuanRepository = $pengajuanRepository;
    }

    public function index()
    {
        $manajer = auth()->user();

        $pengajuans = Pengajuan::whereHas('pegawai', function ($query) use ($manajer) {
            $query->where('user_id', $manajer->user_id);
        })->with('pegawai')->get();

        // dd($pengajuans);
        return view('manajer.approve.index', [
            'data' => $pengajuans
        ]);
    }

    public function approve($id) {
        try {
            DB::beginTransaction();


            $pengajuan = Pengajuan::findOrFail($id);

            Log::info('Data Pengajuan:', [
                'pegawai_id' => $pengajuan->pegawai_id,
                'tanggal_pengajuan' => $pengajuan->tanggal_pengajuan,
                'status' => $pengajuan->status,
                'alasan' => $pengajuan->alasan
            ]);

            if (!$pengajuan->pegawai_id) {
                throw new \Exception('ID Pegawai tidak ditemukan');
            }

            $absensi = new Absensi();
            $absensi->pegawai_id = $pengajuan->pegawai_id;
            $absensi->tanggal_absensi = $pengajuan->tanggal_pengajuan;
            $absensi->status = $pengajuan->status;
            $absensi->keterangan = $pengajuan->alasan;
            $absensi->save();

            $pengajuan->status_pengajuan = 'disetujui';
            $pengajuan->absensi_id = $absensi->id;
            $pengajuan->save();

            DB::commit();
            return redirect()->back()->with('success', 'Pengajuan berhasil disetujui');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat approve:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function reject($id, Request $request) {
        try {
            DB::beginTransaction();

            // Validasi input
            $request->validate([
                'catatan' => 'required|string|max:255',
            ], [
                'catatan.required' => 'Catatan penolakan harus diisi'
            ]);

            // Ambil data pengajuan
            $pengajuan = Pengajuan::findOrFail($id);

            // Update status pengajuan dan catatan
            $pengajuan->status_pengajuan = 'ditolak';
            $pengajuan->catatan = $request->catatan;
            $pengajuan->save();

            // Kirim notifikasi ke pegawai
            $pegawai = Pegawai::find($pengajuan->pegawai_id);
            $pegawai->notify(new PengajuanStatusNotification($pengajuan, 'ditolak'));

            DB::commit();
            return redirect()->back()->with('success', 'Pengajuan berhasil ditolak');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
