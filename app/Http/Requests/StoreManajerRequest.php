<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManajerRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|unique:users',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'password' => 'required|string|min:6'
        ];
    }
    
    public function messages() {
        return[
            'nama.required' => 'nama wajib diisi.',
            'nama.string' => 'nama harus berupa teks.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah terdaftar, gunakan email yang lain.',
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'provinsi.required' => 'provinsi harus di isi',
            'kota.required' => 'kota harus di isi'
        ];
    }
}
