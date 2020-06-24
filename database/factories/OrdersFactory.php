<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Order;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    $status = \App\Models\OrderStatus::where('type', '=', config('order_status.paid'))->first();

    return [
     
        'user_id'       => User::all()->random()->id,
        'user_name'     => $faker->firstName,
        'user_surname'  => $faker->LastName,
        'user_email'    => $faker->unique()->safeEmail,
        'user_phone'    => $faker->phoneNumber, 
        'country'       => $faker->country,
        'city'          => $faker->city,
        'address'       => $faker->address,
        'total'         => $faker->randomFloat(2, 100, 5000),
        'status_id'     => $status->id
       
    ];
});
