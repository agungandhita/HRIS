<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('rekrutmen.page.home');
    }

    public function career() {
        return view ('rekrutmen.page.career');
    }
}
