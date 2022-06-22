<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'room_id'       => 'required',
            'name'          => 'required',
            'from_date'     => 'required|before:until_date',
            'until_date'    => 'required|after:from_date',
            'image'         => 'required|image|file|max:5120',
            'contact'       => 'required',
            'description'   => 'required',
            'link'          => 'required',
            'category'      => 'required'
        ];
    }
}
