<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class CheckProductStock extends Command
{
    protected $signature = 'product:check-stock';
    protected $description = 'Check product stock and send warnings via email';

    public function handle()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->stock <= 0) {
                $this->sendStockWarning($product, 'out_of_stock');
            } elseif ($product->stock < 10) {
                $this->sendStockWarning($product, 'low_stock');
            }
        }
    }

    private function sendStockWarning($product, $status)
    {
        $email = 'admin@example.com';
        $subject = ucfirst($status) . " Warning: Product '{$product->name}'";

        Mail::raw("Product '{$product->name}' is $status. Current stock: {$product->stock}", function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });

        $this->info("{$status} email sent for Product '{$product->name}'");
    }
}
