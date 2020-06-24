<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = config('order_status');
        if (!empty($statuses)) {
            foreach ($statuses as $status) {
                $createStatus[] = ['type' => $status];
            }

           // dd($createStatus);
            DB::table('orders_statuses')->insert($createStatus);
        }
    }
}
