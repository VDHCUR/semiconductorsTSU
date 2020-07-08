<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileDocsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "docs" => ['max:6', 'required'],
            "docs.*" => ['file', 'mimes:xlsx,pdf,doc,xls,docx', 'min:1', "max:10000"]
        ];
    }

    public function messages()
    {
        return [
            'docs.*.mimes' => 'Разрешённые типы фалов: .xlsx, .xls, .pdf, .doc, .docx',
            'docs.max' => 'Максимальное количество файлов - 6 штук',
            'docs.*.max' => 'Максимальный размер отдельного файла - 10Мбайт'
        ];
    }
}
