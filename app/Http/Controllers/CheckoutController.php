<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    public function index(){
        return view('pages.checkout');
    }

    public function store(Request $request){
        $contents = Cart::content()->map(function ($item) {
            return $item->model->name.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    //change to Order ID after we start using DB
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);

            // SUCCESSFUL
            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success', 'Thank you! Your payment has been successfully accepted!');
             } catch (CardErrorException $e) {
                 return back()->withErrors('Error! ' . $e->getMessage());
             }
        }

}
