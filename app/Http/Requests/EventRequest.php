<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:3',
            'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
            'priority_id' => 'required',
            'event' => 'required',
            'publish' => 'required',
            'tgl_mulai' => 'required',
            'waktu_mulai' => 'required',
            'tgl_selesai' => 'required',
            'waktu_selesai' => 'required',
        ];
    }
}
