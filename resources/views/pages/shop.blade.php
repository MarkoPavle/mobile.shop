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
                @include('inc.notifications')

                <div class="single-sidebar" style="width: 200px ; height: 1000px  ; float: left">

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search </h2>
                        <form action="{{route('search')}}" method="GET">
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <h2 class="sidebar-title">Brands</h2>
                    <ul>

                       @foreach($unique as $brand)

                            <li><a href="{{route('shop.brand', ['$brand' => $brand->brand])}}">{{$brand->brand}}</a></li>

                           @endforeach
                    </ul>

                </div>

                <div style="float: right; margin-left: 50%">
                    <strong>Price: </strong>
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>

                </div>

                @foreach($mobiles as $mobile)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="{{route('shop.show',$mobile->id)}}"><img src="{{asset('storage/'.$mobile->image.'')}}"></a>
                        </div>
                        <h2><a href="{{route('shop.show',$mobile->id)}}">{{$mobile->brand}} {{$mobile->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>€{{$mobile->price}}</ins>
                        </div>

                        <div class="product-option-shop">
                            <form action="{{route('cart.store')}}" class="cart" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$mobile->id}}">
                                <input type="hidden" name="name" value="{{$mobile->name}}">
                                <input type="hidden" name="price" value="{{$mobile->price}}">
                                <button class="add_to_cart_button" type="submit">Add to cart</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="container" style="float: left; "> {{$mobiles->links()}}</div>

            </div>
        </div>
    </div>
    @endsection


