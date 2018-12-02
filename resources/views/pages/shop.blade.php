@extends('layouts.home')
@section('title','Mobiles')
@section('big.title')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Mobiles</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach($mobiles as $mobile)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{asset('storage/'.$mobile->image.'')}}">

                        </div>
                        <h2><a href="{{route('shop.show',$mobile->id)}}">{{$mobile->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$mobile->price}}</ins>
                        </div>

                        <div class="product-option-shop">
                            <form action="{{route('cart.store')}}" class="cart" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$mobile->id}}">
                                <input type="hidden" name="name" value="{{$mobile->name}}">
                                <input type="hidden" name="price" value="{{$mobile->price}}">
                                {{--<div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>--}}
                                <button class="add_to_cart_button" type="submit">Add to cart</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    @endsection