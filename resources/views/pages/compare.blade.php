@extends('layouts.home')
@section('title', 'Comparing')
@section('content')

    <div class="container">

    <div style="float:right; margin:10px">

        <a href="{{route('shop')}}" class="add_to_cart_button">Back to Shop</a>

    </div>
    <div id="customer_details" class="col12-set" style="margin: 50px;">

        <div class="product1-section-image">

            <img src="{{asset('storage/'.$product1->image.'')}}" class="recent-thumb" alt="">

        </div>

        <div class="col-1">
            <div class="product1-section-information">
                <a href="{{route('shop.show',$product1->id)}}"> <h1 class="product-section-title">{!!$product1->name!!}</h1></a>
                <h1 class="product-section-price"> € {!!$product1->price!!}</h1>
                <div class="product-section-subtitle">{!!$product1->brand!!} </div>
                <p>{!!$product1->specifications!!}</p>
            </div>
        </div>





        <div class="product2-section-image">

            <img src="{{asset('storage/'.$product2->image.'')}}" class="recent-thumb" alt="">

        </div>

        <div class="col-2">
            <div class="product2-section-information">
                <a href="{{route('shop.show',$product2->id)}}"> <h1 class="product-section-title">{!!$product2->name!!}</h1></a>
                <h1 class="product-section-price"> € {!!$product2->price!!}</h1>
                <div class="product-section-subtitle">{!!$product2->brand!!} </div>
                <p>{!!$product2->specifications!!}</p>
            </div>
        </div>
    </div>
</div>

@endsection