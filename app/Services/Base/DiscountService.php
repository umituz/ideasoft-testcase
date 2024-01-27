<?php

namespace App\Services\Base;

use App\Enum\OrderEnum;
use App\Models\Order;
use App\Models\Product;

class DiscountService
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function applyDiscount($orderId)
    {
        $order = $this->orderService->find($orderId);
        $totalAmount = $order->total;

        $discounts = [];

        $customerDiscount = $this->applyCustomerDiscount($totalAmount);
        if ($customerDiscount > 0) {
            $discounts[] = $this->createDiscountItem('10_PERCENT_OVER_1000', $customerDiscount, $totalAmount - $customerDiscount);
        }

        $categoryDiscount = $this->applyCategoryDiscount($order);
        if ($categoryDiscount > 0) {
            $discounts[] = $this->createDiscountItem('CATEGORY_DISCOUNT', $categoryDiscount, $totalAmount - $categoryDiscount);
        }

        $totalDiscount = $customerDiscount + $categoryDiscount;
        $discountedTotal = $totalAmount - $totalDiscount;

        return [
            'orderId' => $orderId,
            'discounts' => $discounts,
            'totalDiscount' => number_format($totalDiscount, 2),
            'discountedTotal' => number_format($discountedTotal, 2),
        ];
    }

    /**
     * @param $totalAmount
     * @return float|int
     */
    private function applyCustomerDiscount($totalAmount): float|int
    {
        if ($totalAmount >= OrderEnum::MIN_DISCOUNT_AMOUNT) {
            return $totalAmount * OrderEnum::MIN_DISCOUNT_PERCENTAGE;
        }

        return 0;
    }

    private function applyCategoryDiscount(Order $order)
    {
        $categories = $this->getCategoriesForOrder($order);

        $categoryDiscount = 0;

        foreach ($categories as $categoryId => $quantity) {
            if ($quantity >= 6) {
                $freeItemDiscount = floor($quantity / 6);
                $categoryDiscount += $this->getCategoryItemPrice($categoryId) * $freeItemDiscount;
            }

            if ($quantity >= 2) {
                $minPriceItem = $this->getMinPriceItem($categoryId);
                $categoryDiscount += $minPriceItem->price * 0.20;
            }
        }

        return $categoryDiscount;
    }

    private function getCategoriesForOrder(Order $order)
    {
        $items = json_decode($order->items, true);
        $categoryQuantities = [];

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            $product = Product::find($productId);
            $categoryId = $product->category_id;

            if (!isset($categoryQuantities[$categoryId])) {
                $categoryQuantities[$categoryId] = 0;
            }

            $categoryQuantities[$categoryId] += $quantity;
        }

        return $categoryQuantities;
    }


    private function getCategoryItemPrice($categoryId)
    {
        $product = Product::where('category_id', $categoryId)->first();

        return $product ? $product->price : 0;
    }

    private function getMinPriceItem($categoryId)
    {
        return Product::where('category_id', $categoryId)->orderBy('price', 'asc')->first();
    }

    private function createDiscountItem($reason, $discountAmount, $subtotal)
    {
        return [
            'discountReason' => $reason,
            'discountAmount' => number_format($discountAmount, 2),
            'subtotal' => number_format($subtotal, 2),
        ];
    }
}
