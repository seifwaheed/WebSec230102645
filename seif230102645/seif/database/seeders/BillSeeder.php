<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillSeeder extends Seeder {
    public function run() {
        Bill::insert([
            ['item' => 'Milk', 'quantity' => 2, 'price' => 15.00],
            ['item' => 'Bread', 'quantity' => 1, 'price' => 10.00],
            ['item' => 'Eggs', 'quantity' => 12, 'price' => 30.00],
            ['item' => 'Sugar', 'quantity' => 1, 'price' => 20.00],
        ]);
    }
}

