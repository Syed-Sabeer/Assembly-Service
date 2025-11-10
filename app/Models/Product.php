<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'category',
        'tag',
        'f_image',
        'other_images',
        'price',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'other_images' => 'array',
    ];

 public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        // ✅ Generate slug on create
        static::creating(function ($product) {
            $baseSlug = Str::slug($product->title);
            $slug = $baseSlug;
            $counter = 1;

            // Ensure unique slug
            while (static::where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }

            $product->slug = $slug;
        });

        // ✅ Auto-update slug if title changes
        static::updating(function ($product) {
            if ($product->isDirty('title')) {
                $baseSlug = Str::slug($product->title);
                $slug = $baseSlug;
                $counter = 1;

                // Avoid conflicts with other products’ slugs
                while (
                    static::where('slug', $slug)
                        ->where('id', '!=', $product->id)
                        ->exists()
                ) {
                    $slug = "{$baseSlug}-{$counter}";
                    $counter++;
                }

                $product->slug = $slug;
            }
        });
    }
}
