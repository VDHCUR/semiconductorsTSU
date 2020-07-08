<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriesUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_content' => ['string', 'min:20'],
            "images" => ['max:10'],
            "images.*" => ['file', 'mimetypes:image/jpeg,image/png', "max:11000"]
        ];
    }
}
