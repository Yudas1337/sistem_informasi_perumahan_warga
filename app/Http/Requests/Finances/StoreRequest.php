<?php

namespace App\Http\Requests\Finances;

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
            'status'            => 'required|in:in,out',
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
            'date.required'             => 'Tanggal tidak boleh kosong',
            'date.date'                 => 'Format tanggal tidak valid',
            'total.required'            => 'Total uang tidak boleh kosong',
            'total.regex'               => 'Total uang harus berupa angka',
            'status.required'           => 'Status tidak boleh kosong',
            'status.in'                 => 'Status tidak valid'
        ];
    }
}
