<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AddressController extends Controller
{
    private $addresses, $address ;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Auth::user()->addresses;
        return view('website.dashboard.index', [
            'addresses' => $addresses,
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addresses = Auth::user()->addresses;
        return view('website.dashboard.index', [
            'addresses' => $addresses,
            'countries' => Country::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;

        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'address' => 'required|string',
            'address_two' => 'nullable|string',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'mobile' => 'required|numeric',
        ]);

        $address = new Address($data);
        if ($request->default_status == 1)
        {
            $add = Address::where('default_status', 1)->first();
            if ($add)
            {
                $add->default_status = 0;
                $add->save();
            }

            $addressObj = new Address();
            $addressObj->user_id  = Auth::user()->id;
            $addressObj->first_name  = $request->first_name;
            $addressObj->last_name  = $request->last_name;
            $addressObj->country  = $request->country;
            $addressObj->company  = $request->company;
            $addressObj->address  = $request->address;
            $addressObj->address_two  = $request->address_two;
            $addressObj->city  = $request->city;
            $addressObj->postal_code  = $request->postal_code;
            $addressObj->mobile  = $request->mobile;
            $addressObj->default_status  = $request->default_status;
            $addressObj->save();

        }else{
            Auth::user()->addresses()->save($address);
        }

        return redirect()->route('address.index')->with('message', 'Address Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('website.dashboard.edit', [
            'users' => User::all(),
            'countries' => Country::all(),
            'address' => Address::find($decryptID),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'address' => 'required|string',
            'address_two' => 'nullable|string',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'mobile' => 'required|numeric',
        ]);

        $address->update($data);

        return redirect()->route('address.index')->with('message', 'Your Address Info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index')->with('message', 'Your Address deleted successfully');
    }

}
