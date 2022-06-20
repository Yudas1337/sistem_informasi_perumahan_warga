<?php

namespace App\Http\Requests\ManageAdmin;

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
            'name'          => 'required|regex:/^[a-z-A-Z_\s\.]*$/|min:3',
            'email'         => 'required|email|unique:users',
            'phone_number'  => 'required|regex:/^[0-9]*$/|unique:users',
            'gender'        => 'required|in:male,female',
            'password'      => 'required|min:6'
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
            'name.required'         => 'Nama tidak boleh kosong',
            'name.regex'            => 'Nama harus berupa karakter valid',
            'name.min'              => 'Nama minimal 3 karakter',
            'email.required'        => 'Email tidak boleh kosong',
            'email.email'           => 'Email harus valid',
            'email.unique'          => 'Email telah digunakan',
            'phone_number.required' => 'Nomor telepon tidak boleh kosong',
            'phone_number.regex'    => 'Nomor telepon harus berupa angka',
            'phone_number.unique'   => 'Nomor telepon telah digunakan',
            'gender.required'       => 'Jenis kelamin tidak boleh kosong',
            'gender.in'             => 'Gender tidak valid',
            'password.required'     => 'Password tidak boleh kosong',
            'password.min'          => 'Password minimal 6 karakter'
        ];
    }
}
