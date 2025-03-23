<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillSeeder extends Seeder {
    public function run() {
        $bills = [
            ['item_name' => 'Milk', 'quantity' => 2, 'price' => 15.00],
            ['item_name' => 'Bread', 'quantity' => 1, 'price' => 10.00],
            ['item_name' => 'Eggs', 'quantity' => 12, 'price' => 30.00],
            ['item_name' => 'Sugar', 'quantity' => 1, 'price' => 20.00],
        ];

        foreach ($bills as $bill) {
            Bill::updateOrCreate(
                ['item_name' => $bill['item_name']], // Unique constraint to check
                $bill // Data to insert or update
            );
        }
    }
}

