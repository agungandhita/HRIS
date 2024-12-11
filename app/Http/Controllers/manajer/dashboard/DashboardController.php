<?php

namespace App\Http\Controllers\manajer\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $pegawai = User::where('role', 'manajer')
        ->where('user_id', auth()->id())
        ->withCount('pegawai')
        ->first();

    // dd($pegawai);


        return view('manajer.dashboard.index', [
            'pegawai' => $pegawai,
            'title' => 'dashboard'
        ]);
    }
}
