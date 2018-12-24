@extends('layouts.home')
@section('title','Checkout')

@section('extra-css')
        <script src="https://js.stripe.com/v3"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    @endsection

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @include('inc.notifications')
                {{--<div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>

                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>--}}

                <div class="col-md-8" style="margin-left: 20%">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div id="customer_details" class="col2-set">
                                <div class="col-1">

                                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                                    {{ csrf_field() }}
                                    <h2 class="sidebar-title">Billing Details</h2>

                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                    </div>

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                                        </div>
                                    </div> <!-- end half-form -->

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="postalcode">Postal Code</label>
                                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                        </div>
                                    </div> <!-- end half-form -->

                                    <div class="spacer"></div>

                                    <h2>Payment Details</h2>

                                    <div class="form-group">
                                        <label for="name_on_card">Name on Card</label>
                                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- a Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="spacer"></div>

                                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                                </form>

                                    <div >or</div>
                                    <div >
                                        <h2>Pay with PayPal</h2>
                                        <form method="post" id="paypal-payment-form" action="{{route('checkout.paypal')}}">
                                            {{csrf_field()}}
                                            <section>
                                                <div class="bt-drop-in-wrapper">
                                                    <div id="bt-dropin"></div>
                                                </div>
                                            </section>
                                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                                            <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
                                        </form>
                                    </div>


                                </div>

                                    <div class="col-2">
                                        <h2 class="sidebar-title"> Your order</h2>
                                        @foreach(Cart::content() as $item)

                                            <div class="thubmnail-recent">
                                                <img src="{{asset('storage/'.$item->model->image.'')}}" class="recent-thumb" alt="">
                                                <h2><a href="{{route('shop.show',$item->id)}}">{{$item->model->brand}} {{$item->name}}</a></h2>
                                                <div class="product-sidebar-price">
                                                    <ins><span class="amount">{{$item->price}} €</span></ins>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div id="order_review" style="position: relative;">
                                            <table class="shop_table">
                                                <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                                </thead>

                                                <tfoot>
                                                <tr class="cart_item">
                                                    <th class="product-name">Quantity</th>
                                                    <td><strong class="product-quantity">{{Cart::count()}}</strong></td>

                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping and Handling</th>
                                                    <td>
                                                        Free Shipping
                                                        <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                    </td>
                                                </tr>


                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">{{Cart::total()}} €</span></strong> </td>
                                                </tr>

                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>

                                </div>


                                        <div class="clear"></div>

                                    </div>
                                </div>

                            {{--</form>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('extra-js')
    <script>
        (function () {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_DvvQT8VeJlLK7OSlUxhWw9Db');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

            // PayPal Stuff
            var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ $paypalToken }}";

            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                paypal: {
                    flow: 'vault'
                }
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }

                // remove credit card option
                var elem = document.querySelector('.braintree-option__card');
                elem.parentNode.removeChild(elem);

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function (err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }

                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });

        })();



    </script>




    @endsection