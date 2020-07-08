<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationsStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:10', 'max:500'],
            'year' => ['required', 'size:4', 'regex:/(20[0-9]{2}$)/']
        ];
    }
}
