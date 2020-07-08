<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AspirantStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'info' => ['required', 'min:10', 'max:1500'],
            "docs" => ['max:5'],
            "docs.*" => ['file', 'mimes:xlsx,pdf,doc,xls,docx', 'min:1', "max:10000"]
        ];
    }
}
