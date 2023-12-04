<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Country extends Model
{
    use HasFactory;

    private static $country, $countries;

    public static function createCountry($request)
    {
        try {
            self::$country       = new Country();
            self::saveBasicInfo(self::$country, $request);
            self::$country->save();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

    }

    public static function updateCountry($request, $id)
    {
        try {
            self::$country = Country::find($id);
            self::saveBasicInfo(self::$country, $request);
            self::$country->update();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function deleteCountry($id)
    {
        try {
            self::$country = Country::find($id);
            self::$country->delete();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    private static function saveBasicInfo($country, $request)
    {
        self::$country->country        = $request->country;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
