<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'orderId' => $this->resource['orderId'],
            'discounts' => $this->formatDiscounts($this->resource['discounts']),
            'totalDiscount' => $this->resource['totalDiscount'],
            'discountedTotal' => $this->resource['discountedTotal'],
        ];
    }

    private function formatDiscounts($discounts): array
    {
        return collect($discounts)->map(function ($discount) {
            return [
                'discountReason' => $discount['discountReason'],
                'discountAmount' => $discount['discountAmount'],
                'subtotal' => $discount['subtotal'],
            ];
        })->all();
    }
}
