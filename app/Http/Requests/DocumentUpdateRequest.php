<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        $rules = [
            'path' => 'file|mimes:pdf,doc,xls,docx,xlsx,txt|max:10000',
        ];
        return $rules;
    }

    public function messages()
    {
        return[
            'mimes' => 'Документ должен быть формата pdf,doc,xls,docx,xlsx,txt',
            'max' => 'Размер изображения не должно превышать 10Мб',
            'file' => 'Загрузите файл',
        ];
    }
}
