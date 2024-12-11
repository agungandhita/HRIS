<?php

namespace App\Http\Controllers\manajer\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index() {
        return view('manajer.stock.index', [
            'title' => 'stock'
        ]);
    }
}
