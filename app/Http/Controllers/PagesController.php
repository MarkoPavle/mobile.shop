<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class PagesController extends Controller
{
    public function index(){

        $mobiles = Mobile::orderBy('id', 'desc')->take(6)->get();



        return view('homepage')->with([
            'mobiles' => $mobiles,
            ]);
    }
}
