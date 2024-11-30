<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
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
            'vacancy_id' => 'required|exists:vacancies,vacancy_id',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
            'nomor_ktp' => 'required|string|size:16',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:14',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'surat_lamaran' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'jenjang_pendidikan' => 'required|string|in:SMK,SMA,S1,S2',
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nilai' => 'required|numeric|between:0,4.00',
            'nama_perusahaan' => 'nullable|string|max:255',
            'sebagai' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'deskripsi_pekerjaan' => 'nullable|string',
        ];
    }
}
