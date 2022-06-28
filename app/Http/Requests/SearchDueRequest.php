<?php

namespace App\Http\Requests;

class SearchDueRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'search'  => 'required|regex:/^[0-9]*$/'
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
            'search.required'  => 'NIK tidak boleh kosong',
            'search.regex'     => 'NIK harus berupa angka'
        ];
    }
}
