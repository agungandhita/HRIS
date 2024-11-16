<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'level' => 'required|in:kontrak,tetap',
            'posting_date' => 'required|date',
            'closing_date' => 'required|date',
            'job_description' => 'required|array',
            'job_description.*' => 'required|string',
            'qualifications' => 'required|array',
            'qualifications.*' => 'required|string',
        ];
    }
}
