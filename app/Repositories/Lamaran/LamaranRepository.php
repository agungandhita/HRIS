<?php

namespace App\Repositories\Lamaran;

use App\Models\Lamaran;
use App\Models\Vacancy;
use App\Models\JobApplication;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class  LamaranRepository implements LamaranInterface
{

    private $lamaranModel;

    public function __construct(Lamaran $lamaran)
    {
        $this->lamaranModel = $lamaran;
    }


    public function store(array $data)
    {

        // Cek apakah file 'cv' ada dan merupakan instance UploadedFile
        if (isset($data['cv']) && $data['cv'] instanceof UploadedFile) {
            // Upload file dan dapatkan path-nya
            $data['cv'] = $data['cv']->store('resumes', 'public');
        }

        if (isset($data['foto']) && $data['foto'] instanceof UploadedFile) {
            $data['foto'] = $data['foto']->store('foto', 'public');
        }


        return $this->lamaranModel->create($data);
    }
    public function storeJobApplication($vacancyId, $lamarId)
    {
        // dd($lamarId);
        return JobApplication::create([
            'vacancy_id' => $vacancyId,
            'lamar_id' => $lamarId,
            'status' => 'applied',
        ]);
    }

}
