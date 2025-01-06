<?php
namespace App\Repositories\Pengajuan;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengajuanRepository implements PengajuanInterface
{
    public function createPengajuan($data)
    {
        return Pengajuan::create($data);
    }

    public function approve(Pengajuan $pengajuan)
    {
        try {
            DB::beginTransaction();

            // Buat absensi baru ketika disetujui
            $absensi = Absensi::create([
                'pegawai_id' => $pengajuan->pegawai_id,
                'tanggal_absensi' => $pengajuan->tanggal_pengajuan,
                'status' => $pengajuan->status, // izin atau cuti
                'keterangan' => $pengajuan->alasan
            ]);

            // Update pengajuan dengan absensi_id dan status
            $pengajuan->update([
                'status_pengajuan' => 'disetujui',
                'absensi_id' => $absensi->absensi_id
            ]);

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    // public function get() {

    //     $user = Auth::user();

    //     if ($user->role !== 'manajer') {
    //         return collect([]);
    //     }

    //     return Pengajuan::where('pegawai_id', $user->pegawai_id)->get();
    // }
}
