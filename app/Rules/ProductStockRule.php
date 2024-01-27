<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ProductStockRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $product = Product::find($value['product_id']);

        if (!$product || $product->stock < $value['quantity']) {
            $fail(__(':attribute için yeterli stok bulunmamaktadır.', ['attribute' => $attribute]));
        }
    }
}
