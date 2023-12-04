<?php

namespace App\Http\Controllers;


use Auth;
use Cart;
use Session;
use App\Models\Item;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Country;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CheckOutController extends Controller
{
    private $user, $address, $addresses ;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function cuponcheck(Request $request)
    {

        $alldata =Coupon::where('code', $request->cupon)->where('status', 1)->first() ?? 0;

        if ($alldata){
            $usecupon = Order::where('coupon_id', $alldata->id ?? 0)->count() ?? 0;
            $alldata->usage_count = $usecupon ?? 0;

            if($alldata){
                $userusecupon =Order::where('user_id', auth()->user()->id)->where('coupon_id', $alldata->id ?? 0)->count() ?? 0;
                $alldata->user_usage_count = $userusecupon ?? 0;
            }
        }


        return response()->json($alldata);

    }

    public function newOrder(Request $request)
    {
        $user = Auth::user();
        $couponCode = $request->input('cupon_id');
        $coupon = Coupon::where('code', $couponCode)->first();

        $this->order = new Order();
        $this->order->user_id = $user->id;
        $this->order->coupon_id = $coupon->id ?? null;
        $this->order->discount_amount = $request->input('discount_amount');
        $this->order->istimate_total = $request->input('istimate_total');
        $this->order->first_name = $request->input('first_name');
        $this->order->last_name = $request->input('last_name');
        $this->order->country = $request->input('country');
        $this->order->company = $request->input('company');
        $this->order->address = $request->input('address');
        $this->order->address_two = $request->input('address_two');
        $this->order->city = $request->input('city');
        $this->order->postal_code = $request->input('postal_code');
        $this->order->mobile = $request->input('mobile');
        $this->order->note = $request->input('note');
        $this->order->all_terms = $request->input('all_terms');
        $this->order->tracking_id = rand(0, 9999999);
        $this->order->save();

        foreach (Cart::getContent() as $item)
        {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name = $item->name;
            $this->orderDetail->price = $item->price;
            $this->orderDetail->quantity = $item->quantity;
            $this->orderDetail->save();

            Cart::remove($item->id);
        }

        return redirect('/order/confirm');

    }


    public function addInformation()
    {
        $addresses = Auth::user()->addresses;
        $address = null;

        if ($addresses->count() > 0) {
            // Assuming you want to use the first address of the user (you can modify this logic as needed)
            $address = $addresses->first();
        }


        return view('website.checkout.information',[
            'countries' => Country::all(),
            'addresses' => $addresses,
            'address' => $address,
        ]);
    }


    public function information($id)
    {
        $decryptID = Crypt::decryptString($id);

        $addresses = Auth::user()->addresses;
        $address = null;

        if ($addresses->count() > 0) {
            // Assuming you want to use the first address of the user (you can modify this logic as needed)
            $address = $addresses->first();
        }

        $this->product = Item::find($decryptID);

        $quantity = 1; // Default quantity if not specified in the request


        Cart::add([
            'id'            => $this->product->id,
            'name'          => $this->product->name,
            'price'         => $this->product->price,
            'quantity'      => $quantity,
            'attributes'    => [
                'image'     => $this->product->image,
            ]
        ]);

        return view('website.checkout.information',[
            'countries' => Country::all(),
            'addresses' => $addresses,
            'address' => $address,
        ]);
    }

    public function orderConfirm(Request $request)
    {
        return view('website.checkout.checkout');
    }

    public function orderDetail($id)
    {
        $decryptID = Crypt::decryptString($id);

        $order = Order::find($decryptID);
        $orderDetails = OrderDetail::where('order_id', $decryptID)->get();

        return view('website.order.detail', [
            'order' => $order,
            'order_details' => $orderDetails,
        ]);
    }


}
