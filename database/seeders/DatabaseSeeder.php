<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'name' => 'Aldy Ramadhan',
            'username' => 'manager',
            'password' => bcrypt('asd321'),
            'email' => 'aldy89@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        User::create([
            'level_id' => '2',
            'name' => 'Muhammad Galang',
            'username' => 'cashier',
            'password' => bcrypt('asd321'),
            'email' => 'galang110@gmail.com', 
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        User::create([
            'level_id' => '3',
            'name' => 'Sophia',
            'username' => 'admin',
            'password' => bcrypt('asd321'),
            'email' => 'sophia32@gmail.com',
            'picture' => 'avatars-'.mt_rand(1,8).'.png'
        ]);

        $menuData = [
            [
                'name' => 'Carne Guisada',
                'modal' => '68000',
                'price' => '80000',
                'description' => '<div><strong>Consisting of<br></strong>- rice with, <strong><br></strong>- beef cut into small pieces and cooked in a blend of spices.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'shrimp paella',
                'modal' => '100000',
                'price' => '150000',
                'description' => '<div><strong>Consisting of</strong>&nbsp;<br>- paella rice served with fresh shrimp,&nbsp;<br>- spices such as saffron and paprika,&nbsp;<br>- vegetables like bell peppers, onions, and tomatoes&nbsp;</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Beef Stroganoff',
                'modal' => '200000',
                'price' => '250000',
                'description' => '<div><strong>Consisting of <br></strong>- Made with the finest beef in Russia,<br>-served with rice, pasta, or mashed potatoes.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Chicken Tikka Masala',
                'modal' => '80000',
                'price' => '100000',
                'description' => '<div><strong>Consisting of</strong> <strong><br></strong>- chicken pieces with,<br>- a rich and spiced creamy sauce.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Spiralized Chicken',
                'modal' => '135000',
                'price' => '150000',
                'description' => '<div><strong>Consisting of </strong><br>- chicken pieces processed using a spiralizer technique to create spiral shapes resembling pasta.<br>- Served with sauce and vegetables.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Caesar Salat',
                'modal' => '100000',
                'price' => '120000',
                'description' => '<div><strong>Consisting of <br></strong>- romaine lettuce leaves mixed with toasted bread cubes,&nbsp;<br>- grated Parmesan cheese,&nbsp;<br>- and the distinctive Caesar dressing.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Sweet Chili Tofu',
                'modal' => '90000',
                'price' => '105000',
                'description' => '<div>It is <strong>made from</strong> a mixture of ingredients such as red chili peppers, sugar, vinegar, garlic, and fish sauce.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Pappardelle',
                'modal' => '56000',
                'price' => '70000',
                'description' => '<div><strong>Consisting of </strong><br>- pasta made from a dough of wheat flour rolled into wide ribbons,&nbsp;<br>- served with various sauces.</div>',
                'picture' => 'image.png',
                'category' => 'food'
            ],
            [
                'name' => 'Matcha',
                'modal' => '10000',
                'price' => '15000',
                'description' => '-',
                'picture' => 'image.png',
                'category' => 'drink'
            ],
        ];

        $imageUrls = [
            'https://i.ibb.co/cydkjWp/03r-Iwzuawxd-Zc-Hc-J6skw-Mcec-Y5i-GUOj-MPUgq-I1f-W.png',
            'https://i.ibb.co/p1bSnsZ/4dj3-FQt-Rpa-Ovt-VUXI2g8g-RHz-LRUe-Vv-VHnx7-Wif-El.png',
            'https://i.ibb.co/X8WNZzq/NPh-Witdo-KL7fe8-R300-NVQVhr1t-P2-Og98lo-M0-Wi6-L.png',
            'https://i.ibb.co/nncpZYB/q-Tuju-N5ywi-Vv4q-CKm-ZIysyc8b8x5-PEFZnv53-SXAG.png',
            'https://i.ibb.co/pbggPdn/Nwd-U0-QMw-VVWs-Xy-CDH9-Tmx7-VMvwh-Xm5w-O8-YAv-EMUV.png',
            'https://i.ibb.co/zmLzKqm/s-Xmqbk-EQrt-Uq-Vh-Azd-RGG0mf-Jq-UPTHQ0p-NEJd-Hbe6.png',
            'https://i.ibb.co/cNgzFrL/ue-DSl-Zbl-Rg-Hw-Uqn-Cu-VC0-VT7-J9-IMt-Yc-VKkudrj-ZXr.png',
            'https://i.ibb.co/9sMspx4/q-RXfcw9jk-Iz-Fu-K3-UF4-ZNIABpv2-PXw-YKq-Jcjz2-G3r-2.png',
            'https://i.ibb.co/c6HvFFL/8-N4-Dc-RN4u-Ofvv-EOLKGt4a-XFl-Oj-Fi-WFj8-SOn-Ld-GKp.png'
        ];

        foreach ($menuData as $key => $menu) {
            $filename = Str::random(40) . '.png'; 

            $imageData = file_get_contents($imageUrls[$key]); 
            Storage::put('menu/' . $filename, $imageData); 

            $menu['picture'] = 'menu/' . $filename; 

            Menu::create($menu);
        }
    }
}





