@extends('layouts.home')
@section('title',$product->brand .' '. $product->name)
@section('big.title')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{$product->brand}}  {{$product->name}}</h2>
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
            @include('inc.notifications')
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="{{route('search')}}" method="GET">
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>



                    {{--<div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            @foreach($mightAlsoLike as $item)
                            <li><a href="{{route('shop.show',$item->id)}}">{{$item->name}}</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                                @endforeach
                        </ul>
                    </div>--}}
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Similar Products</h2>
                        @foreach($mightAlsoLike as $item)
                        <div class="thubmnail-recent">
                            <img src="{{asset('storage/'.$item->image.'')}}" class="recent-thumb" alt="">
                            <h2><a href="{{route('shop.show',$item->id)}}">{{$item->brand}} {{$item->name}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>{{$item->price}} €</ins>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        {{--<div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>--}}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{asset('storage/'.$product->image.'')}}">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{$product->price}} €</ins>

                                        <ins></ins>
                                    </div>

                                    <form action="{{route('cart.store')}}" class="cart" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        {{--<div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>--}}
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>

                                    <a href="{{ url('compare/'. $product->id) }}" class="add_to_cart_button">Compare</a>

                                    <div class="product-inner-category">
                                        <p>Brand: <a href="">{{$product->brand}}</a> </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Specifications</h2>
                                                <p>{{$product->specifications}}</p>
                                            </div>
                                            {{--<div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>--}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection