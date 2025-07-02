<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_id','province_id', 'address', 'postal_code', 'no', 'unit', 'recipient_first_name', 'recipient_last_name', 'mobile'];
    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(City::class);
    }
}
