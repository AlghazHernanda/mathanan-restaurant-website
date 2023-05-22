<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\Menu::factory(13)->create();
        \App\Models\Order::factory(6)->create();
        //\App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // create seeder user
        User::create([
            'name' => 'Mohamad Alghaz',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'address' => 'Taman Sentosa Blok C / 6 No.10',
            'phonenumber' => "081219288648",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'utype' => 'ADM',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'User Alghaz',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'address' => 'Taman Sentosa Blok C / 6 No.10',
            'phonenumber' => "081219288648",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'utype' => 'USR',
            'remember_token' => Str::random(10),
        ]);


        //create seeder menu
        Menu::create([
            'name' => "Nasi Briyani ayam",
            'slug' => "Nasi-Briyani-ayam",
            'description' => "Nasi Briyani Ayam",
            'regular_price' => 2500,
            'quantity' => 1,
            'image' => 'menu-1.jpeg',
        ]);

        Menu::create([
            'name' => "Nasi Briyani ayam",
            'slug' => "Nasi-Briyani-ayam-besar",
            'description' => "Nasi Briyani Ayam",
            'regular_price' => 45000,
            'quantity' => 1,
            'image' => 'menu-3.jpeg',
        ]);

        Menu::create([
            'name' => "Nasi Briyani Kambing",
            'slug' => "Nasi-Briyani-Kambing",
            'description' => "Nasi Briyani Kambing",
            'regular_price' => 55000,
            'quantity' => 1,
            'image' => 'menu-9.jpeg',
        ]);

        Menu::create([
            'name' => "Sop Iga Sapi",
            'slug' => "Sop-Iga-Sapi",
            'description' => "Sop Iga Sapi",
            'regular_price' => 30000,
            'quantity' => 1,
            'image' => 'menu-15.jpeg',
        ]);

        Menu::create([
            'name' => "Soto Medan Ayam",
            'slug' => "Soto-Medan-Ayam",
            'description' => "Soto Medan Ayam",
            'regular_price' => 20000,
            'quantity' => 1,
            'image' => 'menu-16.jpeg',
        ]);

        Menu::create([
            'name' => "Soto Medan Daging",
            'slug' => "Soto-Medan-Daging",
            'description' => "Soto Medan Daging",
            'regular_price' => 25000,
            'quantity' => 1,
            'image' => 'menu-16.jpeg',
        ]);

        Menu::create([
            'name' => "Sop Kambing",
            'slug' => "Sop-Kambing",
            'description' => "Sop Kambing",
            'regular_price' => 45000,
            'quantity' => 1,
            'image' => 'menu-7.jpeg',
        ]);

        Menu::create([
            'name' => "Gado Gado",
            'slug' => "Gado-Gado",
            'description' => "Gado Gado",
            'regular_price' => 20000,
            'quantity' => 1,
            'image' => 'menu-8.jpeg',
        ]);

        Menu::create([
            'name' => "Nasi Lemak",
            'slug' => "Nasi-Lemak",
            'description' => "Nasi-Lemak",
            'regular_price' => 45000,
            'quantity' => 1,
            'image' => 'menu-10.jpeg',
        ]);

        Menu::create([
            'name' => "Sop Buntut",
            'slug' => "Sop-Buntut",
            'description' => "Sop Buntut",
            'regular_price' => 50000,
            'quantity' => 1,
            'image' => 'menu-14.jpeg',
        ]);
    }
}
