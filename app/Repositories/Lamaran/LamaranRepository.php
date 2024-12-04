<?php

namespace App\Repositories\Lamaran;

use App\Models\Lamaran;
use App\Models\Vacancy;

class  LamaranRepository implements LamaranInterface {

    private $lamaranModel;

    public function __construct(Lamaran $lamaran){
        $this->lamaranModel = $lamaran;
    }



    public function store(array $data){

      return $this->lamaranModel->create($data);
    }

}
