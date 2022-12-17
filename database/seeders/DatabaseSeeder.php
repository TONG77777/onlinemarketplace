<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        
        //Create Admin account
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_as' => 1,
        ]);

        //Create user account
        DB::table('users')->insert([
            'name' => 'asdf',
            'email' => 'asdf@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);

        //Create user account
        DB::table('users')->insert([
            'name' => 'qwer',
            'email' => 'qwer@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);

        //Create category
        DB::table('categories')->insert([
            'name' => 'Computer & technology',
            'description' => 'Computer Technology means any and all electronic media and services, including computers, software, e-mail, telephones, voicemail, facsimile machines, online services, internet, provided to employees by the City.',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Furniture',
            'description' => 'Furniture includes objects such as tables, chairs, beds, desks, dressers, and cupboards. These objects are usually kept in a house or other building to make it suitable or comfortable for living or working in.',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Home & living',
            'description' => 'Refers to furniture, bedding, kitchen and bathroom utensils, indoor accessories and commodities needed in daily life, collectively referred to as household items.',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Hobbies',
            'description' => 'Hobbies is an activity, interest, or pastime that is undertaken for pleasure or relaxation, done during one',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Sport Equipment',
            'description' => 'Sports equipment, sporting equipment, also called sporting goods, are the tools, materials, apparel, and gear used to compete in a sport and varies depending on the sport. ',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Book & Article',
            'description' => 'A book is a medium for recording information in the form of writing or images, typically composed of many pages (made of papyrus, parchment, vellum, or paper) bound together and protected by a cover.',
            'created_at' => now(),
        ]);

        //Create default product
        DB::table('products')->insert([
            'name' => 'Computer Acer 15.6" inch',
            'description' => 'Acer Aspire 5 A515-54-51DJ 15.6" Laptop Computer - Silver; Intel Core i5-1035G1 Processor 1.0GHz; Microsoft Windows 10 Home; 8GB DDR4 Onboard RAM; 256GB PCIe NVMe SSD; Intel UHD Graphics; Secure Digital Card Reader; 802.11ac Wireless; Bluetooth 4.1; 1x HDMI; 1x USB 3.1 Type-C; 2x USB 3.1 Type-A; 1x Headphone/Microphone Combo Jack; 4-cell Lithium-ion Battery; 15.6" Full HD (1920 x 1080) Widescreen LED-backlit IPS Display; 1 Year Limited Warranty',
            'price' => 1000,
            'category' => 1,
            'condition'=> 'Heavily Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 1,
            'url' => 'Computer_monitor.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 1,
            'url' => 'Computer_monitor_2.jpg',
            'created_at' => now(),
        ]);

    }
}
