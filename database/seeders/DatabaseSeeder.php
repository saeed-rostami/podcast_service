<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(1)->create();
        $this->call(CategorySeeder::class);

        User::query()
            ->create([
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'mobile' => '09119381867',
                'is_admin' => 1,
                'email_verified_at' => now(),
                'mobile_verified_at' => now(),
                'password' =>  Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);


    }
}
