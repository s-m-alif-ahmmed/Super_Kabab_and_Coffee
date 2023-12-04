<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Crypt;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.coupon.manage',[
            'coupons' => Coupon::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'starts_at' => ['required', 'date_format:Y-m-d\TH:i:s', 'after:now'],
            'expires_at' => ['required', 'date_format:Y-m-d\TH:i:s', 'after:starts_at'],
            // Add other validation rules for your other fields here
        ];

        $messages = [
            'starts_at.required' => 'The start date is required.',
            'starts_at.date_format' => 'The start date must be a valid date and time in the format YYYY-MM-DDTHH:MM:SS.',
            'starts_at.after' => 'The start date must be after the current date and time.',

            'expires_at.required' => 'The end date is required.',
            'expires_at.date_format' => 'The end date must be a valid date and time in the format YYYY-MM-DDTHH:MM:SS.',
            'expires_at.after' => 'The end date must be after the start date.',
            // Add custom messages for other fields here
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, create the coupon
        Coupon::createCoupon($request);

        return back()->with('message', 'Coupon Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.coupon.detail',[
            'coupon' => Coupon::find($decryptID),
            'order' => Order::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $decryptID = Crypt::decryptString($id);

        return view('admin.coupon.edit',[
            'coupon' => Coupon::find($decryptID),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'starts_at' => ['required', 'date_format:Y-m-d\TH:i:s', 'after:now'],
            'expires_at' => ['required', 'date_format:Y-m-d\TH:i:s', 'after:starts_at'],
            // Add other validation rules for your other fields here
        ];

        $messages = [
            'starts_at.required' => 'The start date is required.',
            'starts_at.date_format' => 'The start date must be a valid date and time in the format YYYY-MM-DDTHH:MM:SS.',
            'starts_at.after' => 'The start date must be after the current date and time.',

            'expires_at.required' => 'The end date is required.',
            'expires_at.date_format' => 'The end date must be a valid date and time in the format YYYY-MM-DDTHH:MM:SS.',
            'expires_at.after' => 'The end date must be after the start date.',
            // Add custom messages for other fields here
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Coupon::updateCoupon($request, $id);
        return redirect('/coupon')->with('message', 'Your Coupon Info update successfully.');
    }

    /**
     * Change Status the specified resource in storage.
     */
    public function couponStatus($id)
    {
        $getStatus = Coupon::select('status')->where('id',$id)->first();
        if($getStatus->status == 0)
        {
            $status = 1;
        }
        elseif($getStatus->status == 1)
        {
            $status = 0;
        }
        Coupon::where('id',$id)->update(['status'=>$status]);
        return back()->with('message','Coupon status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::deleteCoupon($id);
        return redirect('/coupon')->with('message', 'Coupon delete successfully');
    }
}
