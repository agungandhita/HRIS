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
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employes,email',
            'nomor_ktp' => 'required|string|size:16|unique:employes,nomor_ktp',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:14',
            'provinsi' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'alamat_lengkap' => 'required|string|max:500',
            'posisi' => 'required|string|max:100',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'surat_lamaran' => 'required|file|mimes:pdf|max:2048',
            'jenjang_pendidikan' => 'required|string|max:100',
            'nama_institusi' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0|max:100',
            'gpa' => 'required|numeric|min:0|max:4.00',
            'nama_perusahaan' => 'nullable|string|max:255',
            'sebagai' => 'nullable|string|max:100',
            'lama_bekerja' => 'nullable|integer|min:0',
            'deskripsi_pekerjaan' => 'nullable|string|max:1000',
        ];
    }
}
