<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:5',
            'category_id' => 'required',
            'image' => 'image',
        ];
//        if($this->route()->named('products.update')){
//            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
//        }
        return $rules;
    }

    public function messages()
    {
        return[
            'required'=> 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'image' => 'Загрузите изображение',
           //'mimes' => 'Изображение должно быть формата jpeg,png,jpg,gif,svg,webp',
            'max' => 'Размер изображения не должно превышать 2Мб',
        ];
    }
}
