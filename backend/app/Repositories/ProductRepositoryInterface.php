<?php

namespace App\Repositories;

/**
 * Interface ProductRepositoryInterface
 */
interface ProductRepositoryInterface
{
    public function getCategoryItemPrice($categoryId);

    public function getMinPriceItem($categoryId);
}
