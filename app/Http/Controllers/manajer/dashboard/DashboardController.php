<?php

namespace App\Http\Controllers\manajer\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        return view('manajer.dashboard.index', );
    }
}
