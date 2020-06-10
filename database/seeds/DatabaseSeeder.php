<?php

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
        factory(\App\User::class)->create(['name' => 'Elliot Alderson', 'email' => 'elliot.alderson@allsafe.com']);
        factory(\App\User::class,3)->create();
        // $this->call(UsersTableSeeder::class);
    }
}