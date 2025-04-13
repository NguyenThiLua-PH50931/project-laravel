<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResgisterRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email', //|exists:users,email
            'password' => 'required|string|min:8'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => "Tên không được để trống",
            'name.string' => "Tên phải là một chuỗi",
            'name.max' => "Tên không được quá 100 ký tự",
            'name.min' => "Tên không được ít hơn 3 ký tự",
            'email.required' => "Không được để trống email",
            'email.email' => "Email không đúng định dạng",
            // 'email.exists' => "Email chưa được đăng kí",
            'password.required' => "Không được để trống password",
            'password.string' => "Password không phải là chuỗi",
            'password.min' => "Password phải dài hơn 8 ký tự"
        ];
    }
}
