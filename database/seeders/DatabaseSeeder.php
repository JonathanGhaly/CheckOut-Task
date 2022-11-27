<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $orderItem = new OrderItemSeeder;
        $order = new OrderSeeder;
        $product = new ProductSeeder;
        $order->run();
        $product->run();
        $orderItem->run();
    }
}
