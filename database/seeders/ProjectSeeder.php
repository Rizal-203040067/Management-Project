<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;
use App\Models\Customer;
use App\Models\Order;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        $orders = Order::all();

        foreach ($customers as $customer) {
            $order = $orders->where('customer_id', $customer->id)->first();

            if ($order) {
                $project = Project::create([
                    'order_id' => $order->id,
                    'customer_id' => $customer->id,
                    'name' => 'Proyek ' . $customer->name,
                    'model' => 'Model A',
                    'budget' => rand(1000000, 5000000),
                    'status' => 'ongoing',
                    'start_date' => now(),
                    'end_date' => now()->addMonth(),
                    'description' => 'Deskripsi proyek ' . $customer->name,
                ]);

                // Tambahkan beberapa task untuk setiap proyek
                for ($i = 1; $i <= 3; $i++) {
                    Task::create([
                        'project_id' => $project->id,
                        'name' => 'Task ' . $i . ' untuk ' . $project->name,
                        'deadline' => now()->addDays(7 * $i),
                        'is_done' => false,
                    ]);
                }
            }
        }
    }
}
