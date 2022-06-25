<?php

namespace App\Http\Requests\Activity;

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
            'title'         => 'required|max:255|unique:activities',
            'description'   => 'required|max:255',
            'thumbnail'     => 'file|image|mimes:jpg,png,jpeg|max:2048',
            'content'       => 'required|max:5000',
            'location'      => 'required|max:255',
            'date'          => 'required',
            'categories_id' => 'required|regex:/^[0-9]*$/'
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
            'title.required'            => 'Judul tidak boleh kosong',
            'title.max'                 => 'Judul maksimal 255 karakter',
            'title.unique'              => 'Judul telah terdaftar',
            'description.required'      => 'Deskripsi tidak boleh kosong',
            'description.max'           => 'Deskripsi maksimal 255 karakter',
            'thumbnail.file'            => 'Foto harus berupa file',
            'thumbnail.image'           => 'Foto harus berupa gambar valid',
            'thumbnail.mimes'           => 'Foto harus berekstensi jpg/png/jpeg',
            'thumbnail.max'             => 'Ukuran foto maksimal 2 Mb',
            'content.required'          => 'Konten tidak boleh kosong',
            'content.max'               => 'Konten maksimal 5000 karakter',
            'location.required'         => 'Lokasi tidak boleh kosong',
            'location.max'              => 'Lokasi maksimal 255 karakter',
            'date.required'             => 'Tanggal tidak boleh kosong',
            'categories_id.required'    => 'Kategori tidak boleh kosong',
            'categories_id.regex'       => 'Kategori tidak valid'
        ];
    }
}
