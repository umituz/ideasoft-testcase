<?php

namespace App\Jobs;

use App\Models\Product;
use App\Services\Mail\MailService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckProductStockJob implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected Product $product;
    protected MailService $mailService;

    public function __construct(Product $product, MailService $mailService)
    {
        $this->product = $product;
        $this->mailService = $mailService;
    }

    public function handle(): void
    {
        if ($this->product->stock <= 0) {
            $this->sendStockWarning('out_of_stock');
        } elseif ($this->product->stock < 10) {
            $this->sendStockWarning('low_stock');
        }
    }

    /**
     * @param $status
     * @return void
     */
    private function sendStockWarning($status): void
    {
        $to = 'admin@example.com';
        $subject = ucfirst($status) . " Warning: Product '{$this->product->name}'";
        $message = "Product '{$this->product->name}' is $status. Current stock: {$this->product->stock}";

        $this->mailService->send($to, $subject, $message);
    }
}
