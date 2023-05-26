<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Menu;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        level::create([
            'level' => 'manager'
        ]);

        level::create([
           'level' => 'cashier' 
        ]);

        level::create([
           'level' => 'admin' 
        ]);
        
        User::create([
            'level_id' => '1',
            'name' => 'Ariel Anaskar',
            'username' => 'muka',
            'password' => bcrypt('asd321'),
            'email' => 'arielanaskar95@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        User::create([
            'level_id' => '2',
            'name' => 'David Alvalaq',
            'username' => 'gendut',
            'password' => bcrypt('asd321'),
            'email' => 'violetwastaken@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);


        User::create([
            'level_id' => '3',
            'name' => 'Suraj Yoga',
            'username' => 'tegal',
            'password' => bcrypt('asd321'),
            'email' => 'yoga@gmail.com',
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);
    }
}
