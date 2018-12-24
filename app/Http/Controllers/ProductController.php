<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Mobile;

class ProductController extends Controller
{
    public function index(){

        $products = Product::paginate(8);
        return view('pages.products')->with('products', $products);
    }

    public function show($id){

        $product = Product::where('id', $id)->firstOrFail();

        $mightAlsoLike = Product::where('id', '!=', $id)->mightAlsoLike()->get();

        return view('pages.product')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }
}
