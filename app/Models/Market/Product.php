<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ['name', 'introduction', 'slug', 'image', 'weight', 'length', 'width', 'height', 'price', 'status', 'marketable', 'tags', 'sold_number', 'frozen_number', 'marketable_number', 'brand_id', 'category_id', 'published_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function metas()
    {
        return $this->hasMany(ProductMeta::class, 'product_id');
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
}
