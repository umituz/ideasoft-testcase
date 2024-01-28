<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver extends BaseObserver
{
    public function created(Category $category)
    {
        $this->logService->logInfo(__('Category created: ').$category->id);
    }
}
