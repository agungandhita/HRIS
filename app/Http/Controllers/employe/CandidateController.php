<?php 

namespace App\Http\Controllers\employe;

use App\Http\Controllers\Controller;


class CandidateController extends Controller {
    public function index() {
        return view ('rekrutmen.page.home');
    }

    public function career() {

        return view('rekrutmen.page.career');

    }
}