<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'jenkel' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'required',
        ];
    }
}
