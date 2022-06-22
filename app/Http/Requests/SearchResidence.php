<?php

namespace App\Http\Requests;


class SearchResidence extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'search'    => 'required'
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
            'search.required'         => 'Pencarian tidak boleh kosong'
        ];
    }
}
