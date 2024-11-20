<?php

namespace App\Repositories\Loker;

use Carbon\Carbon;
use App\Models\Vacancy;

class LokerRepository implements LokerInterface
{

    private $lokerModel;

    public function __construct(Vacancy $vacancy)
    {
        $this->lokerModel = $vacancy;
    }


    public function showAll()
    {
        $loker = Vacancy::all()->map(function ($loker) {
            if (Carbon::parse($loker->closing_date)->isPast() && $loker->status != 'closed') {
                $loker->status = 'closed';
                $loker->save();
            }

            Carbon::setLocale('id');

            $tanggal = '2024-11-15';
            $tanggalFormat = Carbon::parse($tanggal)->translatedFormat('d F Y');

            // Proses job_description
            $loker->job_description = str_replace(['[', ']', '"'], '', $loker->job_description);
            $loker->job_description = explode(',', $loker->job_description);
            $loker->job_description = array_map('trim', $loker->job_description);

            // Proses qualifications
            $loker->qualifications = str_replace(['[', ']', '"'], '', $loker->qualifications);
            $loker->qualifications = explode(',', $loker->qualifications);
            $loker->qualifications = array_map('trim', $loker->qualifications);

            return $loker;
        });

        return $loker;
    }

    public function getBySlug(string $slug)
    {
        $loker = $this->lokerModel->where('slug', $slug)->firstOrFail();

        // Proses job_description dan qualifications agar selalu dalam bentuk array
        $loker->job_description = $this->processListField($loker->job_description);
        $loker->qualifications = $this->processListField($loker->qualifications);

        return $loker;
    }

    private function processListField($field)
    {
        if (!$field) {
            return [];
        }

        // Menghapus karakter tambahan dan memecah string menjadi array
        $field = str_replace(['[', ']', '"'], '', $field);
        $field = explode(',', $field);
        $field = array_map('trim', $field);

        return $field;
    }
}
