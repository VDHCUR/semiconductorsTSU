<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_header' => ['required', 'string', 'unique:news', 'min:10', 'max:100'],
            'new_lead' => ['max:100'],
            'new_content' => ['required', 'string', 'min:20'],
            "images" => ['max:10'],
            "images.*" => ['file', 'mimetypes:image/jpeg,image/png', "max:10000"]
        ];
    }

    public function messages()
    {
        return [
            'new_header.required' => 'Введите заголовок новости',
            'new_header.unique' => 'Новость с таким заголовком уже есть',
            'new_header.min' => 'Минимальная длина заголовка - 10 символов',
            'new_header.max' => 'Максимальная длина заголовка - 100 символов',
            'new_header.string' => 'Заголовок должен быть представлен текстом',
            'new_lead.string' => 'Подзаголовок должен быть в виде текста',
            'new_lead.min' => 'Минимальная длина подзаголовка - 5 символов',
            'new_lead.max' => 'Максимальная длина подзаголовка - 100 символов',
            'new_content.required' => 'Введите содержание новости',
            'new_content.min' => 'Минимальная длина содержания - 20 символов',
            'images.max' => "Максимальное количество изображений - 10 штук",
            'images.*.mimetypes'=>"Разрешено загружать только изображения"
        ];
    }
}
