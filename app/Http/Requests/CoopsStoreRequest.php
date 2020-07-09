<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoopsStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:5', 'max:200', 'unique:coops'],
            'place' => ['required', 'min:2', 'max:100'],
            'link' => ['max:200']
        ];
    }
}
