<?php

namespace App\Http\Requests\Dues;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'description'       => 'required|max:100',
            'date'              => 'required|date',
            'total'             => 'required|regex:/^[0-9]*$/',
            'residences_id'     => 'required',
        ];
    }

    /**
     * Validation custom Messages.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'description.required'      => 'Deskripsi tidak boleh kosong',
            'description.max'           => 'Deskripsi maksimal 100 karakter',
            'date.required'             => 'Tanggal iuran tidak boleh kosong',
            'date.date'                 => 'Format tanggal tidak valid',
            'total.required'            => 'Total iuran tidak boleh kosong',
            'total.regex'               => 'Total iuran harus berupa angka',
            'residences_id.required'    => 'Alamat rumah tidak boleh kosong'
        ];
    }
}
