<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Crypt;

class CountryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.country.manage', [
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Country::createCountry($request);
        return back()->with('message', 'Country Added Successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.country.detail',[
            'country' => Country::find($decryptID),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.country.edit', [
            'country' => Country::find($decryptID),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Country::updateCountry($request, $id);
        return redirect('/country')->with('message', 'Your Country Info update successfully.');

    }

    /**
     * Change the specified active or inactive in status.
     */

    public function countryChangeStatus($id)
    {
        $getStatus = Country::select('status')->where('id',$id)->first();
        if($getStatus->status == 1)
        {
            $status = 0;
        }
        elseif($getStatus->status == 0)
        {
            $status = 1;
        }
        Country::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Country Status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::deleteCountry($id);
        return redirect('/country')->with('message', 'Your Country delete successfully');

    }
}
