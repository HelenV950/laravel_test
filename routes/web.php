<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/', 'HomeController@index')->name('index');

Route::post('/home/cart/{product}/add', 'HomeController@homeAddToCart')->name('home.AddToCart');



Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});



Auth::routes();


Route::prefix('ajax')->name('ajax.')->namespace('Ajax')->group(function () {
    Route::delete('images/{image}/remove', 'ImagesController@remove')->name('image.remove');
});


Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::get('category/', 'CategoryController@index')->name('category.index');


Route::resource('product', 'ProductController');
Route::get('product/{product}', "ProductController@show")->name('product.show');
Route::get('product', "ProductController@index")->name('product.index');


Route::get('/shop', 'ShopController@index')->name('shop');
Route::post('/shop/cart/{product}/add', 'ShopController@shopAddToCart')->name('shop.AddToCart');






//*Shopping cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}/add', 'CartController@add')->name('cart.add');
Route::post('/cart/{product}/count/update', 'CartController@update')->name('cart.count.update');
Route::delete('/cart/{product}/delete', 'CartController@delete')->name('cart.delete');



//*auth()->user
Route::middleware(['auth','user'])->group(function () {
Route::get('user/profile', 'ProfileController@index')->name('user.profile');  
Route::get('user/profile/edit', 'ProfileController@edit')->name('user.profile.edit');  
Route::post('user/profile/update', 'ProfileController@update')->name('user.profile.update');  
Route::get('/order', 'OrderController@getOrderByUser')->name('user.order');
//*checkout
Route::get('/checkout', 'CheckoutController')->name('checkout');
Route::post('/order/create', 'OrderController@create')->name('order.create');
Route::get('/thankyou/{order}', function($order){
    return view('shop.checkout.thankyou', compact('order'));
})->name('thankyou');
//* wishlist
Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
Route::get('/wishlist/{product}/add', 'WishlistController@add')->name('wishlist.add');
Route::get('user/wishlist', 'WishlistController@userList')->name('user.wishlist'); 
Route::delete('/wishlist/{product}/delete', 'WishlistController@delete')->name('wishlist.delete');
//* Rating
Route::post('rating/{product}/add', 'RatingController@add')->name('rating.add');

});



//* Mail
Route::get('/send', 'MailController@send');


//*admin
Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/orders', 'UsersController@getOrders')->name('users.orders');
 
    Route::resource('products', 'ProductsController')->except(['show']);

    Route::resource('categories', 'CategoriesController')->except(['show']);
  
});

   Route::post('comment/{product}/add', 'CommentController@add')->name('comment.add')->middleware('auth');
