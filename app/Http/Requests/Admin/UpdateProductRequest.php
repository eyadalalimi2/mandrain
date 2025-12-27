<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'name_ar' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku,' . $this->route('product'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'nullable|string|max:1000',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'الفئة مطلوبة.',
            'category_id.exists' => 'الفئة المحددة غير موجودة.',
            'unit_id.required' => 'الوحدة مطلوبة.',
            'unit_id.exists' => 'الوحدة المحددة غير موجودة.',
            'name_ar.required' => 'الاسم بالعربية مطلوب.',
            'sku.required' => 'رمز المنتج مطلوب.',
            'sku.unique' => 'رمز المنتج موجود بالفعل.',
            'image.image' => 'يجب أن تكون الصورة صورة صحيحة.',
            'image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجابايت.',
            'quantity.required' => 'الكمية مطلوبة.',
            'quantity.numeric' => 'الكمية يجب أن تكون رقماً.',
            'quantity.min' => 'الكمية يجب أن تكون أكبر من أو تساوي 0.',
            'price.required' => 'السعر مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون أكبر من أو يساوي 0.',
        ];
    }
}
