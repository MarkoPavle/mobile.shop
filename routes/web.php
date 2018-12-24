<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@index')->name('homepage');

//Mobiles
Route::get('/shop', 'MobileController@index')->name('shop');

Route::get('shop/brand/{brand}', 'MobileController@showBrandProducts')->name('shop.brand');

Route::get('/shop/{product}', 'MobileController@show')->name('shop.show');

//Search

Route::get('/search', 'MobileController@search')->name('search');

//Products
Route::get('/products', 'ProductController@index')->name('products');

Route::get('/products/{product}', 'ProductController@show')->name('products.show');

//Cart
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

//Checkout with stripe and paypall
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

// Product comparing
Route::get('compare/{id}', 'CompareController@compare');
Route::get('comparing', 'CompareController@comparing')->name('comparing');

//Brands
Route::get('/brands', 'BrandController@index')->name('brands');

Route::get('/empty', function (){
    Cart::destroy();
} );



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');