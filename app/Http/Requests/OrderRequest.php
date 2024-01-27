<?php

namespace App\Http\Requests;

use App\Rules\ProductStockRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
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

    /**
     * Get custom attributes for validator errors.
     *
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
     * Add the ProductStockRule to the items validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'items' => $this->validateItems(),
        ]);
    }

    /**
     * Validate the items using the ProductStockRule.
     *
     * @return array
     */
    private function validateItems(): array
    {
        $items = $this->input('items');

        $validator = Validator::make($items, [
            '*' => new ProductStockRule,
        ]);

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }

        return $items;
    }
}
