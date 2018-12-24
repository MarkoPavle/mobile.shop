@extends('layouts.home')
@section('title', 'Thank You')

@section('big.title')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Thank you</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container" style="margin: 20%">
        <div class="row">
        @include('inc.notifications')
            <h1 class="sidebar-title" style="position: center">Thank you! Your payment has been successfully accepted!</h1>
            <div style="position: center">
            <button class="add_to_cart_button"><a href="{{ route('homepage') }}">Home Page</a></button>
            </div>
        </div>
    </div>
    @endsection