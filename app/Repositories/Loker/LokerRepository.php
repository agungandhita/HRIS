<?php

namespace App\Repositories\Loker;

use App\Models\Vacancy;
use Carbon\Carbon;

class LokerRepository implements LokerInterface
{

    private $lokerModel;

    public function __construct(Vacancy $vacancy)
    {
        $this->lokerModel = $vacancy;
    }


    public function showAll()
    {
        $loker = Vacancy::where('status', 'open')
            ->where('closing_date', '>=', now())
            ->get()
            ->map(function ($loker) {
                if (Carbon::parse($loker->closing_date)->isPast()) {
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

        // dd($loker);

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

    public function getById($id)
    {
        $job = $this->lokerModel->where('vacancy_id', $id)->firstOrFail();

        // Proses job_description dan qualifications agar selalu dalam bentuk array
        $job->job_description = $this->processListField($job->job_description);
        $job->qualifications = $this->processListField($job->qualifications);

        return $job;
    }
}
