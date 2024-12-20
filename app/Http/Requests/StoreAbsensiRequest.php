<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'pegawai_id' => 'nullable|exists:pegawais,pegawai_id',
            'tanggal_absensi' => 'nullable|date',
            'keterangan' => 'nullable|string',
            // 'foto_masuk' => 'required|string',
            // 'foto_pulang' => 'required|string',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'pegawai_id' => Auth::guard('pegawai')->user()->pegawai_id,
            'tanggal_absensi' => Carbon::now()->toDateString(),
            'jam_masuk' => Carbon::now()->toTimeString(),
        ]);
    }
}
