<?php

namespace App\Exports;

use App\Models\Gaji;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenggajianExport implements  FromView
{

    public function view(): View {
        return view('admin.penggajian.excel', [
            'penggajians' => Gaji::with('pegawai')->get()
        ]);
    }

    // public function collection()
    // {
    //     return Gaji::with('pegawai')->get();
    // }

    // public function headings(): array
    // {
    //     return [
    //         'No',
    //         'NIP',
    //         'Nama Pegawai',
    //         'Bulan/Tahun',
    //         'Jumlah Masuk',
    //         'Jumlah Terlambat',
    //         'Total Gaji',
    //         'Total Potongan',
    //         'Gaji Bersih',
    //         'Status'
    //     ];
    // }

    // public function map($penggajian): array
    // {
    //     static $no = 0;
    //     $no++;

    //     return [
    //         $no,
    //         $penggajian->pegawai->nip,
    //         $penggajian->pegawai->nama,
    //         $penggajian->bulan . '/' . $penggajian->tahun,
    //         $penggajian->jumlah_masuk . ' hari',
    //         $penggajian->jumlah_terlambat . ' kali',
    //         'Rp ' . number_format($penggajian->total_gaji, 0, ',', '.'),
    //         'Rp ' . number_format($penggajian->total_potongan, 0, ',', '.'),
    //         'Rp ' . number_format($penggajian->gaji_bersih, 0, ',', '.'),
    //         str_replace('_', ' ', $penggajian->status)
    //     ];
    // }
}
