<?php

namespace App\Http\Requests;

use App\Traits\UserTrait;
use Illuminate\Validation\Rule;

class ProfileRequest extends BaseRequest
{
    use UserTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'name'          => 'required|regex:/^[a-z-A-Z_\s\.]*$/|min:3',
            'email'         => ['required', 'email', Rule::unique('users')->ignore($this->getUserId())],
            'phone_number'  => ['required', 'regex:/^[0-9]*$/', Rule::unique('users')->ignore($this->getUserId())],
            'photo'         => 'file|image|max:2048|mimes:jpg,png,jpeg',
            'gender'        => 'required|in:male,female'
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
            'photo.file'            => 'Foto harus berupa file',
            'photo.image'           => 'Foto harus berupa gambar valid',
            'photo.mimes'           => 'Foto harus berekstensi jpg/png/jpeg',
            'photo.max'             => 'Ukuran foto maksimal 2 Mb',
            'gender.required'       => 'Jenis kelamin tidak boleh kosong',
            'gender.in'             => 'Gender tidak valid'
        ];
    }
}
