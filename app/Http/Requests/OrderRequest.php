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
            'total' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'customer_id' => __('customer'),
            'total' => __('total'),
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => __(':attribute field is required.'),
            'customer_id.exists' => __('The selected :attribute is invalid.'),
            'total.required' => __(':attribute field is required.'),
            'total.numeric' => __(':attribute field must be a number.'),
        ];
    }
}
