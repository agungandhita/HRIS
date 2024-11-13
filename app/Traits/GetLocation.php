<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait GetLocation {
    public function getProvince() {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $provinces = $response->json();

        return $provinces;
    }

    public function getRegencies($provinceId) {
        $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        return response()->json($response->json());
    }
}


