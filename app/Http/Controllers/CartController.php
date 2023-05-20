<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\LineItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function getCurrentCart()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $cart = User::find($user_id);
        } else {
            $cart_id = Session::get('cart');
            $cart = Cart::find($cart_id);
        }
        return $cart;
    }

    private function getTotalCartValue($cart)
    {
        $total_price = 0;
        foreach ($cart->products as $product) {
            $total_price += $product->price * $product->pivot->quantity;
        }

        return view('cart.index')
            ->with('line_items', $cart->products)
            ->with('total_price', $total_price);
    }

    public function index()
    {
        $cart = $this->getCurrentCart();
        return $this->getTotalCartValue($cart);
    }

    public function checkout()
    {
        $cart = $this->getCurrentCart();

        if (count($cart->products) <= 0) {
            return redirect(route('cart.index'));
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $line_items = [];

        foreach ($cart->products as $product) {
            $line_item = [
                'price_data' => [
                    'currency' => 'jpy',
                    'unit_amount' => $product->price,
                    'product_data' => [
                        'name' => $product->name,
                        'description' => $product->description,
                        // 'images' => [$item->image], // 商品画像がある場合
                    ],
                ],
                'quantity' => $product->pivot->quantity,
            ];
            array_push($line_items, $line_item);
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('cart.success'),
            'cancel_url' => route('cart.index'),
        ]);

        return view('cart.checkout', [
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
        ]);
    }

    public function success()
    {
        $cart_id = Session::get('cart');
        $user_id = Auth::id();

        LineItem::where('cart_id', $cart_id)->delete();
        LineItem::where('user_id', $user_id)->delete();

        Session::forget('cart');

        return redirect(route('product.index'));
    }
}
