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
        factory(\App\User::class,10)->create();
        factory(\App\Category::class)->create(['title' => 'General']);
        factory(\App\Category::class)->create(['title' => 'Empresas']);
        factory(\App\Category::class)->create(['title' => 'Proyectos']);
        factory(\App\Category::class)->create(['title' => 'Rincón chill-out']);
        factory(\App\Forum::class, 10)->create();        
        factory(\App\Thread::class, 20)->create();
        factory(\App\Post::class, 20)->create();
    }
}