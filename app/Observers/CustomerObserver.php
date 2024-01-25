<?php

namespace App\Observers;

use App\Models\Customer;

class CustomerObserver extends BaseObserver
{
    public function created(Customer $customer)
    {
        $this->logService->logInfo(__('Customer created: ') . $customer->id);
    }
}
