<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Item;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;

    public function index(Request $request, $id)
    {
        $this->product = Item::find($id);

        $quantity = 1; // Default quantity if not specified in the request

        // Check if the quantity is provided in the request and is a valid integer
        if ($request->has('quantity') && is_numeric($request->quantity[$id])) {
            $quantity = (int)$request->quantity[$id];
        }

        Cart::add([
            'id'            => $this->product->id,
            'name'          => $this->product->name,
            'price'         => $this->product->price,
            'quantity'      => $quantity,
            'attributes'    => [
                'image'     => $this->product->image,
            ]
        ]);

        return back()->with('message','Menu Item add successfully.');
    }

    public function show()
    {
        return view('website.cart.add-cart',[
            'cart_products' => Cart::getContent(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $quantity = (int)$request->input('quantity.' . $id);

        if ($quantity > 0) {
            Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity,
                ],
            ]);

            return back()->with('message', 'Cart item info update.');
        } else {
            // If quantity is zero or less, remove the item from the cart
            Cart::remove($id);
            return back()->with('message', 'Cart item info deleted.');
        }
    }



    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('message', 'Cart item info deleted.');
    }

    public function applyDiscount(Request $request)
    {
        $code = Coupon::where('code', $request->code)->first();

        if ($code == null)
        {
            return response()->json([
               'status' => false,
                'message' => 'Invalid discount coupon',
            ]);
        }

        $discountCode = $request->input('code');

        // Fetch the coupon from the database
        $coupon = Coupon::where('code', $discountCode)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return redirect()->route('cart.show')->with('error', 'Invalid coupon code.');
        }

        // Calculate the discount based on coupon type
        $sum = 0;

        foreach (Cart::getContent() as $item) {
            $sum += $item->price * $item->quantity;
        }

        $discountAmount = 0;

        if ($coupon->type === 'percent') {
            // Percentage-based discount
            $discountAmount = ($coupon->discount_amount / 100) * $sum;
        } elseif ($coupon->type === 'fixed') {
            // Fixed amount discount
            $discountAmount = $coupon->discount_amount;
        }

        // Apply the discount to the cart total
        $newTotal = $sum - $discountAmount;

        // Update the cart total and discount amount in the session
        session(['discountAmount' => $discountAmount, 'newTotal' => $newTotal]);

        // Redirect back with success message
        return redirect()->route('cart.show')->with([
            'success' => 'Coupon applied successfully',
            'discountAmount' => $discountAmount,
            'newTotal' => $newTotal,
        ]);


    }

}
