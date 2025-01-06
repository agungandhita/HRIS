<?php
namespace App\Repositories\penggajian;

use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PenggajianRepository implements PenggajianInterface
{

    private $penggajian;

    public function __construct(Gaji $penggajian) {
        $this->penggajian = $penggajian;
    }

    public function getAllWithPegawai()
    {
        return $this->penggajian->with('pegawai')->get();
    }

    public function getById($id)
    {
        return $this->penggajian->with('pegawai')->findOrFail($id);
    }

    public function hitungGaji($bulan, $tahun)
    {
        $existingPenggajian = Gaji::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->exists();

        if ($existingPenggajian) {
            return [
                'status' => false,
                'message' => "Gaji untuk periode {$bulan}/{$tahun} sudah diproses sebelumnya."
            ];
        }

        $pegawais = Pegawai::all();
        $berhasil = 0;

        DB::beginTransaction();
        try {
            foreach ($pegawais as $pegawai) {
                $absensi = Absensi::where('pegawai_id', $pegawai->pegawai_id)
                    ->whereYear('tanggal_absensi', $tahun)
                    ->whereMonth('tanggal_absensi', $bulan)
                    ->get();

                $jumlahMasuk = $absensi->where('status', 'masuk')->count();
                $jumlahTerlambat = $absensi->where('status', 'masuk')
                    ->filter(function ($item) {
                        return Carbon::parse($item->jam_masuk)->format('H:i:s') > '08:00:00';
                    })->count();

                $totalGaji = $jumlahMasuk * $pegawai->gaji_pokok;
                $totalPotongan = $jumlahTerlambat * 5000;
                $gajiBersih = $totalGaji - $totalPotongan;

                Gaji::create([
                    'pegawai_id' => $pegawai->pegawai_id,
                    'jumlah_masuk' => $jumlahMasuk,
                    'jumlah_terlambat' => $jumlahTerlambat,
                    'total_gaji' => $totalGaji,
                    'total_potongan' => $totalPotongan,
                    'gaji_bersih' => $gajiBersih,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'tanggal_penggajian' => now(),
                    'status' => 'belum_di_gaji',
                    'keterangan' => 'Penggajian Bulan ' . $bulan . ' Tahun ' . $tahun
                ]);

                $berhasil++;
            }

            DB::commit();
            return [
                'status' => true,
                'berhasil' => $berhasil,
                'message' => "Berhasil memproses {$berhasil} gaji pegawai."
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function konfirmasiPembayaran($penggajian_id)
    {
        try {
            $penggajian = Gaji::findOrFail($penggajian_id);
            $penggajian->update([
                'status' => 'sudah_di_gaji',
                'tanggal_penggajian' => now()
            ]);

            return [
                'status' => true,
                'message' => 'Pembayaran gaji berhasil dikonfirmasi'
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getSlipGaji($penggajian_id)
    {
        return Gaji::with('pegawai')->findOrFail($penggajian_id);
    }

    public function getLaporanGaji($bulan, $tahun)
    {
        return Gaji::with('pegawai')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->get();
    }


}
