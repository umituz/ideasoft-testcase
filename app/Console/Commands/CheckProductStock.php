<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CheckProductStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:check-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check product stocks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->stock <= 0) {
                $this->warn("Product '{$product->name}' is out of stock!");
            } elseif ($product->stock < 10) {
                $this->warn("Product '{$product->name}' is running low on stock. Current stock: {$product->stock}");
            }
        }
    }
}
