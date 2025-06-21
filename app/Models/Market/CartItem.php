<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['user_id', 'product_id', 'color_id', 'guarantee_id', 'number'];


    /*public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }*/
}
