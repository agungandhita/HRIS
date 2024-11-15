<?php

namespace App\Http\Controllers\admin\vacancy;

use App\Models\Vacancy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index() {
        return view ('admin.loker.index');
    }

    public function add() {
        return view('admin.loker.add');
    }
}
