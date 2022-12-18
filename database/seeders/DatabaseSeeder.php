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
            'created_at' => now(),
        ]);

        //Create user account
        DB::table('users')->insert([
            'name' => 'asdf',
            'email' => 'asdf@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => '2014-12-16 07:28:16',
        ]);

        //Create user account
        DB::table('users')->insert([
            'name' => 'qwer',
            'email' => 'qwer@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => '2019-12-14 03:28:16',
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


        //1 Computer & technology
        //Create default product
        DB::table('products')->insert([
            'name' => 'Computer Acer 15.6" inch',
            'description' => 'Acer Aspire 5 A515-54-51DJ 15.6" Laptop Computer - Black; Intel Core i7-1035G1 Price can negotation',
            'price' => 1000,
            'category' => 1,
            'condition' => 'Heavily Used',
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

        //2 Furniture
        //Create default product
        DB::table('products')->insert([
            'name' => 'Ikea Table White',
            'description' => '100cm x 60cm x 75cm (L x W x H) Price can negotation ',
            'price' => 100,
            'category' => 1,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 2,
            'url' => 'table_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 2,
            'url' => 'table_2.jpg',
            'created_at' => now(),
        ]);

        //3
        //Create default product
        DB::table('products')->insert([
            'name' => 'Gaming Chair',
            'description' => 'NZXT x Vertagear SL5000, from 2019 color black',
            'price' => 799,
            'category' => 2,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 3,
            'url' => 'gaming_chair_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 3,
            'url' => 'gaming_chair_2.jpg',
            'created_at' => now(),
        ]);

        //4
        //Create default product
        DB::table('products')->insert([
            'name' => 'Sofa L Shape 3 Seater',
            'description' => 'clean and good condition, color black',
            'price' => 699,
            'category' => 2,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 4,
            'url' => 'sofa_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 4,
            'url' => 'sofa_2.jpg',
            'created_at' => now(),
        ]);

        //5
        //Create default product
        DB::table('products')->insert([
            'name' => 'Ikea Glass-door cabinet',
            'description' => 'Ikea Product Name : FABRIKÖR, with 2 glass-door cabinets, black color
            Width: 80 cm Depth: 40 cm Height: 180 cm',
            'price' => 799,
            'category' => 3,
            'condition' => 'Well Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 5,
            'url' => 'cabinet_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 5,
            'url' => 'cabinet_2.jpg',
            'created_at' => now(),
        ]);


        //6 Book and Article
        //Create default product
        DB::table('products')->insert([
            'name' => 'Book - The Secret',
            'description' => 'A novel by Rhonda Byrne',
            'price' => 15.99,
            'category' => 6,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 6,
            'url' => 'book_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 6,
            'url' => 'book_2.jpg',
            'created_at' => now(),
        ]);

        //7
        //Create default product
        DB::table('products')->insert([
            'name' => 'Hobbit',
            'description' => 'Novel Book By J.R.R Tolkien',
            'price' => 12,
            'category' => 6,
            'condition' => 'Heavily Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 7,
            'url' => 'book_3.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 7,
            'url' => 'book_4.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 7,
            'url' => 'book_5.jpg',
            'created_at' => now(),
        ]);

        //8
        //Create default product
        DB::table('products')->insert([
            'name' => 'English Grammar In Use',
            'description' => 'English Grammar In Use, Fourth Edition by Raymond Murphy.',
            'price' => 55,
            'category' => 6,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 8,
            'url' => 'book_6.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 8,
            'url' => 'book_7.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 8,
            'url' => 'book_8.jpg',
            'created_at' => now(),
        ]);

        //9
        //Create default product
        DB::table('products')->insert([
            'name' => 'TARC Life Book - for diploma students',
            'description' => 'Second hand book for diploma students, price negotiable',
            'price' => 50,
            'category' => 6,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        //Create default product images
        DB::table('images')->insert([
            'product_id' => 9,
            'url' => 'book_9.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 9,
            'url' => 'book_10.jpg',
            'created_at' => now(),
        ]);

        //10
        //Create default product
        DB::table('products')->insert([
            'name' => 'ACCA Practice and Revision Kit',
            'description' => 'FIA/ CAT FMA-MA (Management Accounting) Revision Kit',
            'price' => 79,
            'category' => 6,
            'condition' => 'Never Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 10,
            'url' => 'book_11.jpg',
            'created_at' => now(),
        ]);

        //11
        //Create default product
        DB::table('products')->insert([
            'name' => 'Introduction to Business Analytics',
            'description' => 'by SC Chuah - Second Edition',
            'price' => 35,
            'category' => 6,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        DB::table('images')->insert([
            'product_id' => 11,
            'url' => 'book_12.jpg',
            'created_at' => now(),
        ]);

        //12
        //Create default product
        DB::table('products')->insert([
            'name' => 'MUET - English for Malaysian Students',
            'description' => 'The new version of MUET - English for Malaysian Students last year bought 2021 edition',
            'price' => 25,
            'category' => 6,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        DB::table('images')->insert([
            'product_id' => 12,
            'url' => 'book_13.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 12,
            'url' => 'book_14.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 12,
            'url' => 'book_15.jpg',
            'created_at' => now(),
        ]);

        //13 Sports
        //Create default product
        DB::table('products')->insert([
            'name' => 'Yonex Astrox 88s',
            'description' => 'Brand - Yonex, Model - Astrox 88s, Condition - 9/10, Grip - 4 1/4 Weight - 88g, Color : Red ',
            'price' => 385,
            'category' => 5,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 13,
            'url' => 'sport_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 13,
            'url' => 'sport_2.jpg',
            'created_at' => now(),
        ]);

        //14
        //Create default product
        DB::table('products')->insert([
            'name' => 'Nike Shoes Bag',
            'description' => 'Brand - Nike, Condition - 9/10, Color : Black and red ',
            'price' => 89,
            'category' => 5,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        DB::table('images')->insert([
            'product_id' => 14,
            'url' => 'sport_3.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 14,
            'url' => 'sport_4.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 14,
            'url' => 'sport_5.jpg',
            'created_at' => now(),
        ]);

        //15
        //Create default product
        DB::table('products')->insert([
            'name' => 'Cycling Helmet',
            'description' => 'Abus X Canyon Airbreaker Road Cycling Helmet, Color : Black',
            'price' => 179,
            'category' => 5,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        DB::table('images')->insert([
            'product_id' => 15,
            'url' => 'sport_6.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 15,
            'url' => 'sport_7.jpg',
            'created_at' => now(),
        ]);

        //16 Hobbies
        //Create default product
        DB::table('products')->insert([
            'name' => 'Gibson Les Paul Custom 2019  - Electric Guitar',
            'description' => 'based on the mid-1950s model with several modern , Color : Black',
            'price' => 878,
            'category' => 4,
            'condition' => 'Lightly Used',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 16,
            'url' => 'hobbies_1.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 16,
            'url' => 'hobbies_2.jpg',
            'created_at' => now(),
        ]);

        //17
        //Create default product
        DB::table('products')->insert([
            'name' => 'CD + VCD Jay Chou',
            'description' => 'Fantasy Plus is the first EP by Taiwanese singer Jay Chou, released on 24 December 2001',
            'price' => 55,
            'category' => 4,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 17,
            'url' => 'hobbies_3.jpg',
            'created_at' => now(),
        ]);

        //18
        //Create default product
        DB::table('products')->insert([
            'name' => 'Paul Simon & Art garfunkel Greatest ',
            'description' => 'FGreatest Hits: Original Stories of Assassins, Hit Men, and Hired Guns',
            'price' => 50,
            'category' => 4,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 18,
            'url' => 'hobbies_4.jpg',
            'created_at' => now(),
        ]);

        //19 Camera
        //Create default product
        DB::table('products')->insert([
            'name' => 'Kodak Ultra F9 - Camera',
            'description' => 'Kodak Ultra F9 Reusable 35mm Camera (Dark Night Green); 
            Lightweight, Pocket-Size Design',
            'price' => 50,
            'category' => 4,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 3,
        ]);

        DB::table('images')->insert([
            'product_id' => 19,
            'url' => 'com_3.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 19,
            'url' => 'com_4.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 19,
            'url' => 'com_5.jpg',
            'created_at' => now(),
        ]);

        //20
        DB::table('products')->insert([
            'name' => 'HP - Printer',
            'description' => 'HP Color Laser 150nw Printer (4ZB95A), Color : White, Condition - 9/10, can use USB or wifi',
            'price' => 455,
            'category' => 4,
            'condition' => 'Like New',
            'created_at' => now(),
            'user_id' => 2,
        ]);

        DB::table('images')->insert([
            'product_id' => 20,
            'url' => 'com_6.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 20,
            'url' => 'com_7.jpg',
            'created_at' => now(),
        ]);
        DB::table('images')->insert([
            'product_id' => 20,
            'url' => 'com_8.jpg',
            'created_at' => now(),
        ]);

        //Create default monthly sales
        DB::table('payments')->insert([
            'amount' => 109,
            'status' => 'success',
            'created_at' => '2022-11-16 21:12:17',
            'order_id' => 1,
        ]);

        DB::table('payments')->insert([
            'amount' => 407,
            'status' => 'success',
            'created_at' => '2022-11-16 21:12:17',
            'order_id' => 2,
        ]);

        DB::table('payments')->insert([
            'amount' => 802,
            'status' => 'success',
            'created_at' => '2022-12-16 21:12:17',
            'order_id' => 3,
        ]);

        DB::table('payments')->insert([
            'amount' => 500,
            'status' => 'failed',
            'created_at' => '2022-12-16 21:12:17',
            'order_id' => 4,
        ]);

        DB::table('orders')->insert([
            'product_id' => 1,
            'status'=> 'pending',
            'amount_to_pay' => 109,
            'shipping_fee' =>3.99,
            'user_id' => 2,
            'created_at' => '2022-11-16 21:12:17',
        ]);
    }
}
