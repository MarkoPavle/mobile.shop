<div class="header-area">
    <div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="{{asset("img/logoo.png")}}"></a></h1>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{route('cart')}}">Cart - <span class="cart-amunt">{{Cart::subtotal()}}$</span> <i class="fa fa-shopping-cart"></i>
                        <span class="product-count">{{Cart::instance('default')->count()}}</span></a>
                </div>
            </div>
                @endif
        </div>
    </div>
</div>
</div> <!-- End site branding area -->
