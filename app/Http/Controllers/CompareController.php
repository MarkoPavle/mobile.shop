<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class CompareController extends Controller
{
    public function compare($id)
    {
        // Check if there is first product in session
        if (session()->has('product1_to_compare')) {

            // If there is first product in session, check if ID of first product is matching id
            // of currently passing id.
            if (session('product1_to_compare') === $id) {
                return redirect()->back()->with('error', 'You cannot select same product for comparison.');
            }

            // Add second product for compare
            if (Mobile::find($id)) {
                session()->put('product2_to_compare', $id);
                // Go to page with products comparing
                return redirect()->route('comparing');
            }
            return redirect()->back()->with('error', 'Product do not exist!');
        }

        // If first product doesn't exist in session, add it as first product
        // First check if exist in db
        if (Mobile::find($id)) {

            // Product exist, put into session
            session()->put('product1_to_compare', $id);
            return redirect()->route('shop')->with('success', 'First product succesfuly added for comparison');
        }
    }

    /**
     * Display page with 2 products comparing
     */
    public function comparing()
    {
        // First check if there is both products in session
        if (!session()->has('product1_to_compare') || !session()->has('product2_to_compare')) {
            return abort(404);
        }

        // Retrieve products from db
        $product1 = Mobile::where('id', session('product1_to_compare'))->first();
        $product2 = Mobile::where('id', session('product2_to_compare'))->first();

        // Flush products from session
        session()->forget('product1_to_compare');
        session()->forget('product2_to_compare');

        return view('pages.compare', compact('product1', 'product2'));
    }
}
