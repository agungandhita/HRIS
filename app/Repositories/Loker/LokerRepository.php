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
        $vacancy = Vacancy::all()->map(function ($item) {
            if (Carbon::parse($item->closing_date)->isPast() && $item->status != 'closed') {
                $item->status = 'closed';
                $item->save();
            }

            Carbon::setLocale('id');

            $tanggal = '2024-11-15';
            $tanggalFormat = Carbon::parse($tanggal)->translatedFormat('d F Y');

            // Proses job_description
            $item->job_description = str_replace(['[', ']', '"'], '', $item->job_description);
            $item->job_description = explode(',', $item->job_description);
            $item->job_description = array_map('trim', $item->job_description);

            // Proses qualifications
            $item->qualifications = str_replace(['[', ']', '"'], '', $item->qualifications);
            $item->qualifications = explode(',', $item->qualifications);
            $item->qualifications = array_map('trim', $item->qualifications);

            return $item;
        });

        return $vacancy;
    }
}
