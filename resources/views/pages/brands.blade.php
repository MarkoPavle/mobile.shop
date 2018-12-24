@extends('layouts.home')
@section('title', 'Brands')

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @include('inc.notifications')
                <div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Nokia"><img src="{{asset('img/brand1.png')}}" alt="nokia"></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Nokia"> Nokia</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Huawei"><img src="{{asset('img/brand2.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Huawei"> Huawei</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Samsung"><img src="{{asset('img/brand3.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Samsung"> Samsung</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Apple"><img src="{{asset('img/brand4.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Apple"> Apple</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Xiaomi"><img src="{{asset('img/brand5.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Xiaomi"> Xiaomi</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/LG"><img src="{{asset('img/brand6.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/LG"> LG</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Vodafone"><img src="{{asset('img/brand7.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Vodafone"> Vodafone</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="http://localhost/mobile.shop/public/shop/brand/Sony"><img src="{{asset('img/brand8.png')}}" alt=""></a>
                                <h2><a href="http://localhost/mobile.shop/public/shop/brand/Sony"> Sony</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection