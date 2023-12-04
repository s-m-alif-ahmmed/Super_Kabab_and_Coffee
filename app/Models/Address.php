<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    private $addresses, $address, $country, $countries ;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'country',
        'company',
        'address',
        'address_two',
        'city',
        'postal_code',
        'mobile',
        'default_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


}
