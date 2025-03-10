<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'contact' => '08123456789', 'address' => 'Jl. Merdeka No.1'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'contact' => '08198765432', 'address' => 'Jl. Mawar No.2'],
        ];

        foreach ($customers as $custData) {
            $customer = Customer::create($custData);

            // Tambahkan order untuk setiap customer
            Order::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_id' => $customer->id,
                'status' => 'pending',
                'total_amount' => rand(50000, 200000),
            ]);
        }
    }
}
