<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver extends BaseObserver
{
    public function created(Order $order)
    {
        $this->logService->logInfo(__('Order created: ').$order->id);
    }
}
