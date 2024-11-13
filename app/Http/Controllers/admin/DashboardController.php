<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {

        $manajer = User::where('role', 'manajer')->count();


        return view('admin.dashboard.index', compact('manajer'));
    }
}
