<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Running Shoes', 'description' => 'High-performance shoes designed for running and jogging'],
            ['name' => 'Sneakers', 'description' => 'Casual and lifestyle sneakers for everyday wear'],
            ['name' => 'Football Shoes', 'description' => 'Professional football boots and cleats'],
            ['name' => 'Casual Shoes', 'description' => 'Comfortable casual shoes for daily activities'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
