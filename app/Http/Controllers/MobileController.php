<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;
use App\Brand;
use App\Product;

class MobileController extends Controller
{
    public function index(){

        /*$mobiles = Mobile::paginate(9);*/

        $brands = Mobile::select('brand')->get();

        $unique = $brands->unique('brand');

        $unique->values()->all();


        //if there is brand in request
        if(request()->brand){
            $mobiles = Mobile::where('brand' , '=', 'brand')->get();
            dd($mobiles);
        }


        if (request()->sort == 'low_high') {
            $mobiles = Mobile::orderBy('price')->paginate(9);
        } elseif (request()->sort == 'high_low') {
            $mobiles = Mobile::orderBy('price', 'desc')->paginate(9);
        } else {
            $mobiles = Mobile::paginate(9);

        }

        return view('pages.shop')->with([
            'mobiles' => $mobiles,
            'unique' => $unique,
        ]);


    }

    public function show($id){

            $product = Mobile::where('id', $id)->firstOrFail();

            $mightAlsoLike = Mobile::where('id', '!=', $id)->mightAlsoLike()->get();

            return view('pages.product')->with([
                'product' => $product,
                'mightAlsoLike' => $mightAlsoLike
            ]);
    }

    public function showBrandProducts($brand)
    {


        $brands = Mobile::select('brand')->get();

        $unique = $brands->unique('brand');

        $unique->values()->all();

        if (request()->sort == 'low_high') {
            $mobiles = Mobile::orderBy('price')->where('brand', $brand)->paginate(9);
        } elseif (request()->sort == 'high_low') {
            $mobiles = Mobile::orderBy('price', 'desc')->where('brand', $brand)->paginate(9);
        }
        else{
            $mobiles = Mobile::where('brand', $brand)->paginate(9);
        }

        return view('pages.shop')->with([
            'mobiles' => $mobiles,
            'unique' => $unique
        ]);
    }

    public function search(Request $request){

        $request->validate([
            'query' => 'required|min:3',]);

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('specifications', 'like', "%$query%")
                            ->get();

        $mobiles = Mobile::where('name', 'like', "%$query%")
                            ->orWhere('brand', 'like', "%$query%")
                            ->orWhere('specifications', 'like', "%$query%")
                            ->get();

        return view('pages.search')->with([
            'products' => $products,
            'mobiles' => $mobiles
        ]);

    }
}
