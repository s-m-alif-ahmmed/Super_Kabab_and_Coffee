<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.item.manage', [
            'categories'    => Category::all(),
            'items'         => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.item.index', [
            'categories'    => Category::all(),
            'items'    => Item::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::createItem($request);
        return back()->with('message', 'Item Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decryptID = Crypt::decryptString($id);
        return view('admin.item.detail',[
            'category'  => Category::find($decryptID),
            'item'      => Item::find($decryptID),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decryptID = Crypt::decryptString($id);
        return view('admin.item.edit', [
            'categories'  => Category::all(),
            'item'      => Item::find($decryptID),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Item::updateItem($request, $id);
        return redirect('/item')->with('message', 'Your Item Info update successfully.');
    }

    /**
     * Change the specified active or inactive in status.
     */
    public function itemChangeStatus($id)
    {
        $getStatus = Item::select('status')->where('id',$id)->first();
        if($getStatus->status == 1)
        {
            $status = 0;
        }
        elseif($getStatus->status == 0)
        {
            $status = 1;
        }
        Item::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Item Status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::deleteItem($id);
        return redirect('/item')->with('message', 'Your item delete successfully');
    }


}
