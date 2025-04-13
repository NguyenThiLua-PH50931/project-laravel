<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=>'required',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|integer|min:0',
            'isHot'=>'required',
            'image'=>'required',
        ];
    }

    public function messages():array{
        return [
            'name.required'=>"Tên sản phẩm không được để trống",
            'name.max'=>"Tên sản phẩm không được quá 100 ký tự",
            'name.string'=>"Tên sản phẩm phải là một chuỗi",
            'name.min'=>"Tên sản phẩm không được ít hơn 3 ký tự",
            'category_id.required'=>"Vui lòng chọn tên danh mục",
            'price.required'=>"Giá không được để trống",
            'price.numeric'=>"Giá phải là một số nguyên hoặc một số thực",
            'price.min'=>"Giá phải lớn hơn 0",
            'stock.required'=>"Số lượng sản phẩm không được để trống",
            'stock.integer'=>"Số lượng sản phẩm phải là một số nguyên",
            'stock.min'=>"Số lượng sản phẩm phải là một số nguyên dương",
            'isHot.required'=>"Độ hot sản phẩm không được để trống",
            'image.required'=>"Ảnh sản phẩm không được để trống",
        ];
    }


}
