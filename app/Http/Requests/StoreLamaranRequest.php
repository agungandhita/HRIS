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
            'vacancy_id' => 'required|exists:vacancies,vacancy_id',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:15',
            'kabupaten' => 'required|string|max:20',
            'kecamatan' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required|string|max:50',
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nilai' => 'required|string',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'foto' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email sudah pernah digunakan untuk melamar',
            'nomor_ktp.unique' => 'Nomor KTP sudah pernah digunakan untuk melamar',
            'cv.max' => 'Ukuran CV maksimal 5MB',
            'cv.mimes' => 'CV harus dalam format PDF, DOC, atau DOCX',
        ];
    }
}
