<?php

namespace App\Http\Controllers\admin\data;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KaryawanController extends Controller
{
    public function index() {

        $data = Pegawai::all();

        // dd($data);

        return view ('admin.karyawan.index', [
            'data' => $data
        ]);
    }
}
