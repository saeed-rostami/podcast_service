<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "هنر",
            "کسب و کار",
            "کمدی",
            "آموزش",
            "داستان",
            "داستان",
            "تاریخی",
            "سرگرمی",
            "جنایات واقعی",
            "تکنولوژی",
            "ورزش",
            "جامعه و فرهنگ",
        ];



        foreach ($categories as $item) {
            Category::query()
                ->create([
                    'title' => $item,
                ]);
        }

    }
}
