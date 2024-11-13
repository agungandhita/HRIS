<?php

namespace App\Http\Controllers\manajer\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        return view ('manajer.data.index');
    }
}
