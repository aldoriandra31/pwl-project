<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelanggaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'siswa_id' => ['required'],
            'guru_id' => ['required'],
            'kasus_id' => ['required'],
            'tanggal_pelanggaran' => ['required', 'date'],
            'gambar' => ['nullable', 'image', 'file', 'max:2048'],
        ];
    }
}
