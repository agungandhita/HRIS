<?php

namespace App\Http\Controllers\admin\employe;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeRequest;
use App\Repositories\Employe\EmployeInterface;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    private $employeRepository;

    public function __construct(EmployeInterface $employeRepository) {

    $this->employeRepository = $employeRepository;
    }
    
    public function index() {
        return view('admin.employe.index');
    }
    


    public function store(StoreEmployeRequest $storeEmployeRequest){

         // Mengambil data yang telah divalidasi dari StoreEmployeRequest
         $validatedData = $storeEmployeRequest->validated();

         // Menggunakan repository untuk menyimpan data
         $this->employeRepository->store($validatedData);
 
         // Redirect dengan pesan sukses
         return redirect()->back()->with('success', 'Data pegawai berhasil disimpan.');


    }
}
