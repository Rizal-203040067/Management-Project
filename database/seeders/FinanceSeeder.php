<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Transaction;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan', 'is_expense' => true, 'image' => 'makanan.png'],
            ['name' => 'Transportasi', 'is_expense' => true, 'image' => 'transportasi.png'],
            ['name' => 'Gaji', 'is_expense' => false, 'image' => 'gaji.png'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create($cat);

            // Tambahkan transaksi per kategori
            Transaction::create([
                'name' => 'Transaksi ' . $category->name,
                'category_id' => $category->id,
                'date_transaction' => now(),
                'amount' => rand(10000, 500000),
                'note' => 'Catatan transaksi ' . $category->name,
                'image' => 'transaksi.png',
            ]);
        }
    }
}
