<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItemSelectedAttribute extends Model
{
    use HasFactory, SoftDeletes;

    public function categoryAttribute()
    {
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function categoryAttributeValue()
    {
        return $this->belongsTo(CategoryValue::class,'category_value_id');
    }
}
