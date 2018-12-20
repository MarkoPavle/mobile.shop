<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    public function index(){
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        /*try {*/
            $paypalToken = $gateway->ClientToken()->generate();
        /*} catch (\Exception $e) {
            $paypalToken = null;
        }*/
        return view('pages.checkout')->with('paypalToken',$paypalToken);
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


        public function paypalCheckout(Request $request){
            $gateway = new \Braintree\Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);


            $nonce = $request->payment_method_nonce;


            $result = $gateway->transaction()->sale([
                'amount' => Cart::total(),
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {

                $transaction = $result->transaction;

                return redirect()->route('confirmation.index')->with('success', 'Thank you! Your payment has been successfully accepted!');

            } else {
                return back()->with('error', 'Error , try again.');
            }
        }

}
