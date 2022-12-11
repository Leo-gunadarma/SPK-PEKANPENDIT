<?php

namespace App\Http\Requests;

use App\Models\Kriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class UpdateKriteria extends FormRequest
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
            'kode_kriteria' => [
                'required',
                Rule::unique('kriteria')->ignore(Request::input('kode_kriteria'), 'kode_kriteria'),
                'max:255'
            ],
            'nama_kriteria' => 'required',
            'bobot' => 'required|integer',
            'jenis' => 'required|in:keuntungan,biaya',
            'tipe_kriteria' => 'required|in:integer,float,pilihan',
        ];
    }
}
