<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    private static $itemCount, $category, $categories, $item, $items, $image, $directory, $imageName, $imageUrl;

    public static function uploadImage($request)
    {
        self::$image            = $request->file('image');
        self::$imageName        = self::$image->getClientOriginalName();
        self::$directory        = "images/items/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         = self::$directory.self::$imageName;
        return self::$directory.self::$imageName;
    }

    public static function createItem($request)
    {
        self::$imageUrl             = self::uploadImage($request);
        self::$item                 = new Item();
        self::$item->category_id    = $request->category_id;
        self::$item->name           = $request->name;
        self::$item->description    = $request->description;
        self::$item->price          = $request->price;
        self::$item->image          = self::$imageUrl;
        self::$item->save();
    }

    public static function updateItem($request, $id)
    {
        self::$item = Item::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$item->image)){
                unlink(self::$item->image);
            }
            self::$imageUrl = self::uploadImage($request);
        }
        else{
            self::$imageUrl = self::$item->image;
        }
        self::$item->category_id    = $request->category_id;
        self::$item->name           = $request->name;
        self::$item->description    = $request->description;
        self::$item->price          = $request->price;
        self::$item->image          = self::$imageUrl;
        self::$item->save();

    }

    public static function deleteItem($id)
    {
        self::$item = Item::find($id);
        if (file_exists(self::$item->image))
        {
            unlink(self::$item->image);
        }
        self::$item->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
