@extends('layouts.home')
@section('title','Accessories')
@section('big.title')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Accessories</h2>
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
                @include('inc.notifications')
                {{--<div class="single-sidebar" style="width: 150px ; height: 1000px  ; float: left">
                    <h2 class="sidebar-title">Brands</h2>
                    <ul>

                    </ul>
                </div>--}}

                {{--<div style="float: right; margin-left: 50%">
                    <strong>Price: </strong>
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>

                </div>--}}
                <div>
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <a href="{{route('products.show',$product->id)}}"><img src="{{asset('storage/'.$product->image.'')}}"></a>
                                </div>
                                <h2><a href="{{route('products.show',$product->id)}}"> {{$product->name}}</a></h2>
                                <div class="product-carousel-price">
                                    <ins>€{{$product->price}}</ins>
                                </div>
                                <div class="product-option-shop">
                                    <form action="{{route('cart.store')}}" class="cart" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>

                        </div>
                        </div>
                    @endforeach
                </div>

                <div class="container" style="float: left; "> {{$products->links()}}</div>

            </div>
        </div>
    </div>
@endsection


