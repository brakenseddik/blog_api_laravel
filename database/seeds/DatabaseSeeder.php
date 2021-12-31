<?php

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'name' => 'admin',
            'address' => '',
            'email' => 'admin@admin.com',
            'password' =>  \Illuminate\Support\Facades\Hash::make('123456'),
            'is_admin' => 1,
        ]);
        Hospital::create([
            'name' => 'user',
            'address' => '',
            'email' => 'user@user.com',
            'password' =>  \Illuminate\Support\Facades\Hash::make('123456'),
            'is_admin' => 0,
        ]);
    }
}
