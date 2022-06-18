<?php

namespace App\Http\Requests;


class ChangePasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'old_password'              => 'required|current_password',
            'password'                  => 'required|min:6|confirmed',
            'password_confirmation'     => 'required'
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
            'old_password.required'                 => 'Password lama tidak boleh kosong',
            'old_password.current_password'         => 'Password lama tidak cocok',
            'password.required'                     => 'Password baru tidak boleh kosong',
            'password.min'                          => 'Password baru minimal 6 karakter',
            'password.confirmed'                    => 'Ulangi password tidak cocok',
            'password_confirmation.required'        => 'Ulangi password tidak boleh kosong'
        ];
    }

    /**
     * Encrypt password to hash and merge it.
     *
     * @return void
     */

    protected function passedValidation(): void
    {
        $this->merge([
            'password' => bcrypt($this->password)
        ]);
    }
}
