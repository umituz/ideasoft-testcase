<?php

namespace App\Services\Base;

use App\Enum\DiscountEnum;
use App\Http\Resources\DiscountResource;
use App\Models\Order;

class DiscountService
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param $order
     * @return DiscountResource
     */
    public function applyDiscount($order): DiscountResource
    {
        $totalAmount = $order->total;

        $discounts = [];

        $customerDiscount = $this->applyCustomerDiscount($totalAmount);
        if ($customerDiscount > 0) {
            $discounts[] = $this->createDiscountItem('10_PERCENT_OVER_1000', $customerDiscount, $totalAmount - $customerDiscount);
        }

        $categoryDiscount = $this->applyCategoryDiscount($order);
        if ($categoryDiscount > 0) {
            $discounts[] = $this->createDiscountItem('BUY_5_GET_1', $categoryDiscount, $totalAmount - $categoryDiscount);
        }

        $totalDiscount = $customerDiscount + $categoryDiscount;
        $discountedTotal = $totalAmount - $totalDiscount;

        return new DiscountResource([
            'orderId' => $order->id,
            'discounts' => $discounts,
            'totalDiscount' => number_format($totalDiscount, 2),
            'discountedTotal' => number_format($discountedTotal, 2),
        ]);
    }

    /**
     * @param $totalAmount
     * @return float|int
     */
    private function applyCustomerDiscount($totalAmount): float|int
    {
        if ($totalAmount >= DiscountEnum::MIN_DISCOUNT_AMOUNT) {
            return $totalAmount * DiscountEnum::MIN_DISCOUNT_PERCENTAGE;
        }

        return 0;
    }

    /**
     * @param Order $order
     * @return float|int
     */
    private function applyCategoryDiscount(Order $order): float|int
    {
        $categories = $this->getCategoriesForOrder($order);
        $categoryDiscount = 0;

        foreach ($categories as $categoryId => $quantity) {
            if ($categoryId == DiscountEnum::BUY_2_OR_MORE_CATEGORY_ID) {
                if ($quantity >= DiscountEnum::BUY_2_OR_MORE_QUANTITY) {
                    $discountedItemCount = floor($quantity / DiscountEnum::BUY_2_OR_MORE_QUANTITY);
                    $minPriceItem = $this->getMinPriceItem($categoryId);
                    $discountedItemTotal = $minPriceItem->price * DiscountEnum::BUY_2_OR_MORE_PERCENTAGE * $discountedItemCount;
                    $categoryDiscount += $discountedItemTotal;
                    $order->total -= $discountedItemTotal;
                }
            }

            if ($categoryId == DiscountEnum::BUY_5_GET_1_CATEGORY_ID) {
                if ($quantity >= DiscountEnum::BUY_5_GET_1_QUANTITY) {
                    $freeItemCount = floor($quantity / DiscountEnum::BUY_5_GET_1_QUANTITY);
                    $freeItemTotal = $this->getCategoryItemPrice($categoryId) * $freeItemCount;
                    $categoryDiscount += $freeItemTotal;
                    $order->total -= $freeItemTotal;
                }
            }
        }

        return $categoryDiscount;
    }

    /**
     * @param Order $order
     * @return array
     */
    private function getCategoriesForOrder(Order $order): array
    {
        $items = json_decode($order->items, true);
        $categoryQuantities = [];

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            $product = $this->productService->find($productId);
            $categoryId = $product->category_id;

            if (!isset($categoryQuantities[$categoryId])) {
                $categoryQuantities[$categoryId] = 0;
            }

            $categoryQuantities[$categoryId] += $quantity;
        }

        return $categoryQuantities;
    }

    /**
     * @param $categoryId
     * @return int
     */
    private function getCategoryItemPrice($categoryId): int
    {
        return $this->productService->getCategoryItemPrice($categoryId);
    }

    /**
     * @param $categoryId
     */
    private function getMinPriceItem($categoryId)
    {
        return $this->productService->getMinPriceItem($categoryId);
    }

    /**
     * @param $reason
     * @param $discountAmount
     * @param $subtotal
     * @return array
     */
    private function createDiscountItem($reason, $discountAmount, $subtotal): array
    {
        return [
            'discountReason' => $reason,
            'discountAmount' => number_format($discountAmount, 2),
            'subtotal' => number_format($subtotal, 2),
        ];
    }
}
