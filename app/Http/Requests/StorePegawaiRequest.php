<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
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
            'tanggal_lahir' => 'required|date',
            'nip' => 'numeric|digits_between:1,19',
            'no_telepon' => 'required|string|max:14',
            'email' => 'required|email|unique:pegawais,email',
            'password' => 'required|string|min:8',
        ];
    }
}
