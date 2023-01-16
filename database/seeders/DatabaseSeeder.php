<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Menu;

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

        // level::create([
        //     'level' => 'manager'
        // ]);

        // level::create([
        //    'level' => 'cashier' 
        // ]);

        // level::create([
        //    'level' => 'admin' 
        // ]);

        Menu::create([
           'name' => 'Nasi Ayam Penyet',
           'price' => 10000,
           'picture' => 'menu-item-8.png',
           'category' => 'food',
           'status' => 'ready' 
        ]);
    }
}
