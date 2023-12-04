<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.manage', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::createCategory($request);
        return back()->with('message', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.category.detail',[
            'category' => Category::find($decryptID),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.category.edit', [
            'category' => Category::find($decryptID),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category')->with('message', 'Your Category Info update successfully.');
    }

    /**
     * Change the specified active or inactive in status.
     */

    public function categoryChangeStatus($id)
    {
        $getStatus = Category::select('status')->where('id',$id)->first();
        if($getStatus->status == 1)
        {
            $status = 0;
        }
        elseif($getStatus->status == 0)
        {
            $status = 1;
        }
        Category::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Category Status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::deleteCategory($id);
        return redirect('/category')->with('message', 'Your category delete successfully');
    }
}
