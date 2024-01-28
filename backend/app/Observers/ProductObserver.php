<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver extends BaseObserver
{
    public function created(Product $product)
    {
        $this->logService->logInfo(__('Product created: ').$product->id);
    }
}
