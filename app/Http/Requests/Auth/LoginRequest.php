<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required'
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
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email harus valid',
            'password.required' => 'Password tidak boleh kosong'
        ];
    }
}
