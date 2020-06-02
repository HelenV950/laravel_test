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
                $creatStatus[] = ['type' => $status];
            }

           // dd($creatStatus);
            DB::table('orders_statuses')->insert($creatStatus);
        }
    }
}
