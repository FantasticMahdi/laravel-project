<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_images';
    protected $fillable = ['image', 'product_id'];
    protected $casts = ['image' => 'array'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
