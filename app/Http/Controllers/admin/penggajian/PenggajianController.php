<?php

namespace App\Http\Controllers\admin\penggajian;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PenggajianExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\penggajian\PenggajianInterface;

class PenggajianController extends Controller
{
    private $penggajianRepository;

    public function __construct(PenggajianInterface $penggajianRepository)
    {
        $this->penggajianRepository = $penggajianRepository;
    }

    public function index()
    {
        $currentMonth = date('n');
        $currentYear = date('Y');

        $penggajians = Gaji::with('pegawai')
            ->where('bulan', $currentMonth)
            ->where('tahun', $currentYear)
            ->get();

        return view('admin.penggajian.index', compact('penggajians'));
    }

    public function riwayat(Request $request)
    {
        $bulan = $request->input('bulan', date('n'));
        $tahun = $request->input('tahun', date('Y'));

        $penggajians = Gaji::with('pegawai')
            ->where('bulan', $bulan)
            ->where('tahun', $tahun) // Filter berdasarkan tahun yang dipilih
            ->orderBy('tahun', 'desc') // Urutkan berdasarkan tahun
            ->orderBy('bulan', 'desc') // Urutkan berdasarkan bulan
            ->get()
            ->groupBy(function ($item) {
                return $item->tahun . '-' . $item->bulan;
            });


        return view('admin.penggajian.riwayat', compact('penggajians'));
    }

    public function prosesGaji(Request $request)
    {
        $result = $this->penggajianRepository->hitungGaji(
            $request->bulan,
            $request->tahun
        );

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }


    public function konfirmasiPembayaran($id)
    {
        $result = $this->penggajianRepository->konfirmasiPembayaran($id);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['message']);
        }

        return redirect()->back()->with('error', $result['message']);
    }

    public function slipGaji($id)
    {
        $penggajian = $this->penggajianRepository->getSlipGaji($id);

        $pdf = PDF::loadView('admin.penggajian.slip-pdf', compact('penggajian'));

        return view('admin.penggajian.slip', compact('penggajian'));
    }

    public function downloadSlipGaji($id)
    {
        $penggajian = $this->penggajianRepository->getSlipGaji($id);
        $pdf = PDF::loadView('admin.penggajian.slip-pdf', compact('penggajian'));

        return $pdf->download('slip-gaji-' . $penggajian->pegawai->nama . '-' . date('F-Y') . '.pdf');
    }



    public function exportExcel()
    {
        return Excel::download(new PenggajianExport, 'penggajian_' . date('Y-m-d') . '.xlsx');
    }




}
