<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class UpdateAlternatif extends FormRequest
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
            'kode_alternatif' => [
                'required',
                Rule::unique('alternatif')->ignore(Request::input('kode_alternatif'), 'kode_alternatif'),
                'max:255'
            ],
            'nama_alternatif' => 'required',
        ];
    }
}
