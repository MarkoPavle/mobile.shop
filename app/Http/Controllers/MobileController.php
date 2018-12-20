<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;
use App\Brand;


class MobileController extends Controller
{
    public function index(){

        /*$mobiles = Mobile::paginate(9);*/

        $brands = Mobile::select('brand')->get();


        $unique = $brands->unique('brand');

        $unique->values()->all();

        //if there is brand in request
        if(request()->brand){
            $mobiles = Mobile::with('brand')->whereHas('brand', function ($query){
                $query->where('name', request()->brand);
            })->get();
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
}
