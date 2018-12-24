@extends('layouts.home')
@section('title', 'Cart')
@section('big.title')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    @endsection

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @include('inc.notifications')
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">You might also like</h2>
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
                        <div class="woocommerce">

                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Cart::count()>0)
                                        <h2>{{Cart::count()}} items in cart</h2>


                                    @foreach (Cart::content() as $item)
                                        <div class="cart-item">
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="remove" type="submit">Remove</button>
                                            </form>

                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="{{route('shop.show',$item->id)}}"><img width="145" height="145" class="shop_thumbnail"  src="{{asset('storage/'.$item->model->image.'')}}"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{route('shop.show',$item->id)}}">{{$item->model->brand}} {{$item->name}}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">{{$item->price}} €</span>
                                        </td>


                                        <td class="product-subtotal">
                                            <span class="amount">{{$item->price}} €</span>
                                        </td>

                                    </tr>
                                        </div>


                                    @endforeach
                                    @else
                                        <div style="margin: 5px">
                                        <h2 > No items in cart</h2>
                                         <button type="submit" action="{{ route('shop') }}">Continue Shopping</button>
                                        </div>
                                        <div class="clear"></div>

                                    @endif
                                    </tbody>
                                </table>


                            <div class="cart-collaterals">
                                <div>
                                   <a href="{{route('checkout')}}"> <button type="submit" class="submit">Proceed to checkout</button></a>
                                </div>
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{Cart::subtotal()}}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{Cart::total()}}</span></strong> </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
