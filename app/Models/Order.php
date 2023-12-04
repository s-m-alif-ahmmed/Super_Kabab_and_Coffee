<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'coupon_id',
        'discount_amount',
        'istimate_total',
        'first_name',
        'last_name',
        'country',
        'company',
        'address',
        'address_two',
        'city',
        'postal_code',
        'mobile',
        'status',
        'note',
        'all_terms',
        'tracking_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define the relationship with the User model
    public function coupons()
    {
        return $this->belongsTo(Coupon::class);
    }

    // Define the relationship with the OrderDetail model
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
