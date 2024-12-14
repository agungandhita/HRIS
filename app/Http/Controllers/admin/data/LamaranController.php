<?php

namespace App\Http\Controllers\admin\data;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Models\Vacancy;

class LamaranController extends Controller
{
    public function index() {
        $lamaran = JobApplication::with('lamaran', 'vacancy')->get();
        // dd($lamaran);

        return view('admin.lamaran.index', [
            'data' => $lamaran,
            'lamaran' => Lamaran::all(),
            'vacancy' => Vacancy::all()

        ]);
    }
}
