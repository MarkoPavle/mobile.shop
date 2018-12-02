<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;


class MobileController extends Controller
{
    public function index(){
        $mobiles = Mobile::all();
        return view('pages.shop')->with('mobiles' , $mobiles);
    }

    public function show($id){

            $product = Mobile::where('id', $id)->firstOrFail();

            return view('pages.product')->with([
                'product' => $product,

            ]);
    }
}
