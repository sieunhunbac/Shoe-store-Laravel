<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1, // Running Shoes
                'name' => 'Nike Air Zoom',
                'description' => 'Lightweight running shoes with responsive Zoom Air cushioning. Breathable mesh upper keeps your feet cool during intense runs. Designed for speed and comfort on any distance.',
                'price' => 129.99,
                'sale_price' => 99.99,
                'stock' => 50,
                'color' => 'Black/White',
                'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 1, // Running Shoes
                'name' => 'Adidas Ultraboost',
                'description' => 'Premium running shoes featuring Boost midsole technology for incredible energy return. Primeknit upper provides sock-like fit and breathability for your best runs.',
                'price' => 149.99,
                'sale_price' => null,
                'stock' => 35,
                'color' => 'Core Black',
                'image_url' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 1, // Running Shoes
                'name' => 'Asics Gel Kayano',
                'description' => 'Stability running shoes with GEL technology cushioning system. Designed for overpronators, providing maximum support and comfort for long-distance running.',
                'price' => 139.99,
                'sale_price' => 119.99,
                'stock' => 30,
                'color' => 'Blue/Silver',
                'image_url' => 'https://images.unsplash.com/photo-1579338559194-a162d19bf842?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 2, // Sneakers
                'name' => 'Converse Chuck Taylor',
                'description' => 'The iconic Chuck Taylor All Star sneaker. Classic canvas upper with vulcanized rubber sole. A timeless silhouette that goes with everything.',
                'price' => 59.99,
                'sale_price' => null,
                'stock' => 80,
                'color' => 'White',
                'image_url' => 'https://images.unsplash.com/photo-1465453869711-7e174808ace9?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 2, // Sneakers
                'name' => 'Nike Air Force 1',
                'description' => 'The legendary Air Force 1. Premium leather upper with encapsulated Air-Sole unit for comfort. A streetwear icon that never goes out of style.',
                'price' => 109.99,
                'sale_price' => 89.99,
                'stock' => 60,
                'color' => 'White/White',
                'image_url' => 'https://images.unsplash.com/photo-1512374382149-233c42b6a83b?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 2, // Sneakers
                'name' => 'Jordan Retro',
                'description' => 'Retro Jordan sneakers combining heritage basketball design with modern comfort. Premium materials and iconic styling for the sneaker enthusiast.',
                'price' => 179.99,
                'sale_price' => null,
                'stock' => 25,
                'color' => 'Red/Black',
                'image_url' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 3, // Football Shoes
                'name' => 'Puma Future',
                'description' => 'Next-generation football boots with NETFIT lacing technology. Customize your fit for ultimate control on the pitch. Lightweight design for explosive speed.',
                'price' => 119.99,
                'sale_price' => null,
                'stock' => 40,
                'color' => 'Neon Yellow',
                'image_url' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 3, // Football Shoes
                'name' => 'Mizuno Morelia',
                'description' => 'Premium kangaroo leather football boots crafted in Japan. Exceptional ball feel and touch with barefoot-like comfort. Built for the purist player.',
                'price' => 159.99,
                'sale_price' => 139.99,
                'stock' => 20,
                'color' => 'Black/Gold',
                'image_url' => 'https://images.unsplash.com/photo-1621315271772-28b1f3a5df87?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 4, // Casual Shoes
                'name' => 'New Balance 574',
                'description' => 'Classic lifestyle sneaker with ENCAP midsole technology. Suede and mesh upper provides a retro look with modern comfort for all-day wear.',
                'price' => 89.99,
                'sale_price' => null,
                'stock' => 55,
                'color' => 'Grey/Navy',
                'image_url' => 'https://images.unsplash.com/photo-1516767254874-281bffac9e9a?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 4, // Casual Shoes
                'name' => 'Vans Old Skool',
                'description' => 'The Vans Old Skool features the iconic side stripe, durable suede and canvas uppers, and signature waffle outsole. Perfect for skateboarding and casual wear.',
                'price' => 69.99,
                'sale_price' => 54.99,
                'stock' => 70,
                'color' => 'Black/White',
                'image_url' => 'https://images.unsplash.com/photo-1608667508764-33cf0726b13a?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 4, // Casual Shoes
                'name' => 'Adidas Samba',
                'description' => 'Iconic indoor soccer shoe turned street style staple. Soft leather upper with suede T-toe and gum rubber outsole. A versatile classic for any wardrobe.',
                'price' => 99.99,
                'sale_price' => null,
                'stock' => 45,
                'color' => 'White/Black',
                'image_url' => 'https://images.unsplash.com/photo-1496202703211-aa28e9500c30?w=600&h=600&fit=crop',
            ],
            [
                'category_id' => 4, // Casual Shoes
                'name' => 'Reebok Classic',
                'description' => 'Timeless Reebok Classic Leather with soft garment leather upper. EVA midsole provides lightweight cushioning. A clean, versatile sneaker for everyday style.',
                'price' => 79.99,
                'sale_price' => 64.99,
                'stock' => 65,
                'color' => 'White/Gum',
                'image_url' => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&h=600&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => Str::slug($product['name'])],
                [
                    'category_id' => $product['category_id'],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'sale_price' => $product['sale_price'],
                    'stock' => $product['stock'],
                    'size' => '39,40,41,42,43',
                    'color' => $product['color'],
                    'status' => 'active',
                    'image' => null, // Will use unsplash URL via accessor
                ]
            );
        }
    }
}
