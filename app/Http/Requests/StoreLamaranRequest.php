<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLamaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vacancy_id'         => 'required|exists:vacancies,vacancy_id',
            'nama_lengkap'       => 'required|string|max:255',
            'email'              => 'required|email|unique:lamarans,email',
            'nomor_ktp'          => 'required|string|size:16',
            'tanggal_lahir'      => 'required|date',
            'no_telepon'         => 'required|string|max:14',
            'provinsi'           => 'required|string',
            'kabupaten'          => 'required|string',
            'alamat_lengkap'     => 'required|string',
            'cv'                 => 'required|file|mimes:pdf,doc,docx',
            'foto'               => 'required|image',
            'surat_lamaran'      => 'required|file|mimes:pdf,doc,docx',
            'jenjang_pendidikan' => 'required|string',
            'nama_institusi'     => 'required|string',
            'jurusan'            => 'required|string',
            'gpa'                => 'required|numeric|between:0,4.00',
            'nama_perusahaan'    => 'nullable|string',
            'sebagai'            => 'nullable|string',
            'start_date'         => 'nullable|date',
            'end_date'           => 'nullable|date|after_or_equal:start_date',
            'deskripsi_pekerjaan' => 'nullable|string',
        ];
    }
}
