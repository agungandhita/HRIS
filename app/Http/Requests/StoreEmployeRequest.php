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
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:employe',
            'nomor_ktp' => 'required|numeric|min:16',
            'tanggal_lahir' => 'required|date|before:-17 years',
            'no_telepon' => 'required|numeric|digits_between:10,15',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'alamat_lengkap' => 'required',
            'posisi' => 'required',
            'cv' => 'required|file|mimes:pdf,docx,doc|max:5120',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'surat_lamaran' => 'required|file|mimes:pdf,docx,doc|max:5120',
            'jenjang_pendidikan' => 'required|string',
            'nama_institusi' => 'required|string',
            'jurusan' => 'required|string',
            'gpa' => 'required|numeric|min:0|max:4',
        ];
    }
}
