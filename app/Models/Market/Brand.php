<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, softDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'original_name'
            ]
        ];
    }

    protected $fillable = ['persian_name', 'original_name', 'slug', 'logo', 'status', 'tags'];

    protected $casts = ['logo' => 'array'];
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
