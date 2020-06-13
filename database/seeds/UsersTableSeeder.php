<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       

        $admin = \App\Models\Role::where('name', '=', config('roles.admin'))->first();
        //dd($admin);
        \App\Models\User::create([
            'role_id' => $admin->id,
            'name' => 'Admin',
            'surname' => 'Adminovich',
            'email' => env('ADMIN_EMAIL'),
            'password' =>env('ADMIN_PASSWORD'), 
            'birth_date' => '1980-12-12',
            'phone' => env('ADMIN_PHONE')



        ]);

        factory(\App\Models\User::class, 3)->create();
       
    }
}
