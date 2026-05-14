<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'image',
        'stock',
        'size',
        'color',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'sale_price' => 'decimal:2',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDisplayPriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }

        // Product-specific Unsplash images for seeded data
        $images = [
            'nike-air-zoom' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop',
            'adidas-ultraboost' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=600&h=600&fit=crop',
            'asics-gel-kayano' => 'https://images.unsplash.com/photo-1579338559194-a162d19bf842?w=600&h=600&fit=crop',
            'converse-chuck-taylor' => 'https://images.unsplash.com/photo-1465453869711-7e174808ace9?w=600&h=600&fit=crop',
            'nike-air-force-1' => 'https://images.unsplash.com/photo-1512374382149-233c42b6a83b?w=600&h=600&fit=crop',
            'jordan-retro' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=600&h=600&fit=crop',
            'puma-future' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?w=600&h=600&fit=crop',
            'mizuno-morelia' => 'https://images.unsplash.com/photo-1621315271772-28b1f3a5df87?w=600&h=600&fit=crop',
            'new-balance-574' => 'https://images.unsplash.com/photo-1516767254874-281bffac9e9a?w=600&h=600&fit=crop',
            'vans-old-skool' => 'https://images.unsplash.com/photo-1608667508764-33cf0726b13a?w=600&h=600&fit=crop',
            'adidas-samba' => 'https://images.unsplash.com/photo-1496202703211-aa28e9500c30?w=600&h=600&fit=crop',
            'reebok-classic' => 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=600&h=600&fit=crop',
        ];

        return $images[$this->slug] ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&h=600&fit=crop';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
