<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'code' => 'required|in:KG,HALF,QUARTER,BASKET',
            'factor' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => 'الاسم بالعربية مطلوب.',
            'code.required' => 'الكود مطلوب.',
            'code.in' => 'الكود يجب أن يكون واحد من: KG, HALF, QUARTER, BASKET.',
            'factor.numeric' => 'العامل يجب أن يكون رقماً.',
            'factor.min' => 'العامل يجب أن يكون أكبر من أو يساوي 0.',
        ];
    }
}
