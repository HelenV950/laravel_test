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
        $statuses = config('orders_statuses');
        if (!empty($statuses)) {
            foreach ($statuses as $status) {
                $createStatus[] = ['type' => $status];
            }

           // dd($createStatus);
            DB::table('orders_statuses')->insert($createStatus);
        }
    }
}
