<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:100|min:3|string',

        ];
    }

    public function messages():array{
        return [
            'name.required'=>"Tên sản phẩm không được để trống",
            'name.max'=>"Tên sản phẩm không được quá 100 ký tự",
            'name.string'=>"Tên sản phẩm phải là một chuỗi",
            'name.min'=>"Tên sản phẩm không được ít hơn 3 ký tự",
        ];
    }
}
