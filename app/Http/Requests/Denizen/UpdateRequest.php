<?php

namespace App\Http\Requests\Denizen;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(): array
    {
        return [
            'nik'               => 'required|regex:/^[0-9]*$/|min:10',
            'name'              => 'required|regex:/^[a-z-A-Z_\s\.]*$/|min:3',
            'phone_number'      => 'nullable|min:3|regex:/^[0-9]*$/',
            'gender'            => 'required|in:male,female',
            'birth_place'       => 'required',
            'birth_date'        => 'required|date',
            'religion'          => 'required|in:islam,kristen,katolik,hindu,budha,konghucu',
            'families'          => 'required|in:husband,housewife,child,single',
            'photo'             => 'file|image|max:2048|mimes:jpg,png,jpeg',
            'residences_id'     => 'required'
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
            'nik.required'          => 'NIK tidak boleh kosong',
            'nik.regex'             => 'NIK harus berupa angka',
            'nik.min'               => 'NIK minimal 10 digit',
            'nik.unique'            => 'NIK telah terdaftar',
            'name.required'         => 'Nama tidak boleh kosong',
            'name.regex'            => 'Nama harus berupa karakter valid',
            'name.min'              => 'Nama minimal 3 karakter',
            'phone_number.min'      => 'Nomor telepon minimal 3 digit',
            'phone_number.regex'    => 'Nomor telepon harus berupa angka',
            'phone_number.unique'   => 'Nomor telepon telah terdaftar',
            'gender.required'       => 'Jenis kelamin tidak boleh kosong',
            'gender.in'             => 'Jenis kelamin tidak valid',
            'birth_place.required'  => 'Tempat lahir tidak boleh kosong',
            'birth_date.required'   => 'Tanggal lahir tidak boleh kosong',
            'birth_date.date'       => 'Tanggal lahir tidak valid',
            'religion.required'     => 'Agama tidak boleh kosong',
            'religion.in'           => 'Agama tidak valid',
            'families.required'     => 'Status tidak boleh kosong',
            'families.in'           => 'Status tidak valid',
            'photo.file'            => 'Foto harus berupa file',
            'photo.image'           => 'Foto harus berupa gambar valid',
            'photo.mimes'           => 'Foto harus berekstensi jpg/png/jpeg',
            'photo.max'             => 'Ukuran foto maksimal 2 Mb',
            'residences_id.required' => 'Alamat rumah tidak boleh kosong'
        ];
    }
}
