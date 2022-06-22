<?php

namespace App\Http\Requests\Residence;

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
            'neighbourhood'     => 'required|regex:/^[0-9]*$/',
            'hamlet'            => 'required|regex:/^[0-9]*$/',
            'address'           => 'required',
            'house_types_id'    => 'required',
            'images'            => 'file|image|max:2048|mimes:jpg,png,jpeg'
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
            'neighbourhood.required'    => 'RT tidak boleh kosong',
            'neighbourhood.regex'       => 'RT harus berupa digit angka',
            'hamlet.required'           => 'RW tidak boleh kosong',
            'hamlet.regex'              => 'RW harus berupa digit angka',
            'address.required'          => 'Alamat tidak boleh kosong',
            'house_types_id.required'   => 'Tipe rumah tidak boleh kosong',
            'images.file'               => 'Foto harus berupa file',
            'images.image'              => 'Foto harus berupa gambar',
            'images.max'                => 'Ukuran foto maksimal 2 Mb',
            'images.mimes'              => 'Foto harus berekstensi jpg,png,jpeg'

        ];
    }
}
