<?php

namespace App\Services\Base;

use App\Enum\OrderEnum;
use App\Http\Resources\DiscountResource;
use App\Models\Order;
use App\Models\Product;

class DiscountService
{
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
        if ($totalAmount >= OrderEnum::MIN_DISCOUNT_AMOUNT) {
            return $totalAmount * OrderEnum::MIN_DISCOUNT_PERCENTAGE;
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
            if ($quantity >= 6) {
                // İndirimli ürün sayısını hesapla (her 6 üründe bir ücretsiz)
                $freeItemCount = floor($quantity / 6);

                // İndirimli ürün miktarı kadar ücretsiz ürün fiyatını hesapla
                $freeItemTotal = $this->getCategoryItemPrice($categoryId) * $freeItemCount;

                // Toplam indirim tutarına ekle
                $categoryDiscount += $freeItemTotal;

                // Ücretsiz ürünlerin fiyatını toplam tutardan düş
                $order->total -= $freeItemTotal;
            }

            if ($quantity >= 2) {
                // Kategorideki ürünlerin en ucuzunu bul
                $minPriceItem = $this->getMinPriceItem($categoryId);

                // İndirimli ürün miktarı kadar %20 indirim uygula
                $discountedItemTotal = $minPriceItem->price * 0.20;

                // Toplam indirim tutarına ekle
                $categoryDiscount += $discountedItemTotal;

                // %20 indirim uygulanan ürünlerin fiyatını toplam tutardan düş
                $order->total -= $discountedItemTotal;
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

            $product = Product::find($productId);
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
        $product = Product::where('category_id', $categoryId)->first();

        return $product ? $product->price : 0;
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    private function getMinPriceItem($categoryId): mixed
    {
        return Product::where('category_id', $categoryId)->orderBy('price', 'asc')->first();
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
