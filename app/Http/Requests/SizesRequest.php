<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name.ar' => 'required',
            'name.en' => 'required'
        ];
    }
}
