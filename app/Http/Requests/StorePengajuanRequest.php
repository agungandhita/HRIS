<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanRequest extends FormRequest
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
            'status' => 'required|in:izin,cuti',
            'alasan' => 'required|string',
            'surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'tanggal_pengajuan' => 'required|date',
        ];
    }
}
