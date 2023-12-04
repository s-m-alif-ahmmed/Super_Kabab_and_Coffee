<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use DB;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.home.index',[
            'items' => Item::where('status', 1)->orderBy('id', 'desc')->take(4)->get(),
            'categories' => Category::all(),
        ]);
    }

    public function menuPage($id)
    {
        $decryptID = Crypt::decryptString($id);

        $items = Item::where('status', 1)
            ->where('category_id', $decryptID)
            ->paginate(24);

        return view('website.home.menu-page',[
            'categories' => Category::all(),
            'items' =>  $items,
        ]);
    }

    public function orderOnline()
    {
        $items = Item::where('status', 1)
            ->paginate(24);

        return view('website.home.order-online',[
            'categories' => Category::all(),
            'items' =>  $items,
        ]);
    }

    public function story()
    {
        return view('website.home.our-story');
    }

    public function detail($id)
    {
        $decryptID = Crypt::decryptString($id);
        return view('website.home.detail',[
            'item' => Item::find($decryptID),
        ]);
    }


}
