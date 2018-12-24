@extends('layouts.home')
@section('title', 'Search')
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
                </div>
                <div class="col-md-8">
                    <h1>Search Results</h1>
                    <h5>{{$products->count()}} Accessories result(s) and {{$mobiles->count() }} Mobile result(s) for '{{request()->input('query')}}'</h5>

                    @if ($mobiles->count() > 0)

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 250px">Name</th>
                                <th>Specifications</th>
                                <th style="width: 70px">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mobiles as $mobile)
                                <tr>
                                    <th><a href="{{ route('shop.show', $mobile->id) }}">{{ $mobile->name }}</a></th>
                                    <td>{{ str_limit($mobile->specifications, 50) }}</td>
                                    <td>{{ $mobile->price }} €</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif

                    @if ($products->count() > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 250px">Name</th>
                                <th>Specifications</th>
                                <th style="width: 70px">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></th>
                                    <td>{{ $product->specifications }}</td>
                                    <td>{{ $product->price }} €</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection