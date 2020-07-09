<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_header' => ['required', 'string', 'min:10', 'max:100'],
            'new_lead' => ['max:100'],
            'new_content' => ['required', 'string', 'min:20'],
            "images" => ['max:10'],
            "images.*" => ['file', 'mimetypes:image/jpeg,image/png', "max:10000"]
        ];
    }
}
