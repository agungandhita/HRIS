<?php

namespace App\Http\Controllers\admin\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('admin.stock.index');
    }
}