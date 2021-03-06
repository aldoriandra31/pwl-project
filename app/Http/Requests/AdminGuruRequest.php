<?php

namespace App\Http\Requests;

use App\Models\Guru;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminGuruRequest extends FormRequest
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
            'nip' => ['required', 'numeric', Rule::unique('gurus')->ignore($this->guru)],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin_id' => ['required'],
        ];
    }
}
