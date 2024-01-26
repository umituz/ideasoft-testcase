<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    //public function authorize(): bool
    //{
    //    return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array|min:1', // 'items' bir dizi olmalı ve en az bir öğe içermelidir
            'items.*.product_id' => 'required|exists:products,id', // Her öğe için 'product_id' gereklidir ve 'products' tablosunda var olmalıdır
            'items.*.quantity' => 'required|integer|min:1', // Her öğe için 'quantity' bir tam sayı olmalıdır ve en az 1 olmalıdır
            'total' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'customer_id' => __('customer'),
            'items' => __('items'),
            'items.*.product_id' => __('product_id'),
            'items.*.quantity' => __('quantity'),
            'total' => __('total'),
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'customer_id.required' => __(':attribute field is required.'),
            'customer_id.exists' => __('The selected :attribute is invalid.'),
            'items.required' => __(':attribute field is required.'),
            'items.array' => __(':attribute must be an array.'),
            'items.min' => __(':attribute must have at least one item.'),
            'items.*.product_id.required' => __(':attribute field is required for each item.'),
            'items.*.product_id.exists' => __('The selected :attribute is invalid for one of the items.'),
            'items.*.quantity.required' => __(':attribute field is required for each item.'),
            'items.*.quantity.integer' => __(':attribute must be an integer for each item.'),
            'items.*.quantity.min' => __(':attribute must be at least 1 for each item.'),
            'total.required' => __(':attribute field is required.'),
            'total.numeric' => __(':attribute field must be a number.'),
        ];
    }
}
