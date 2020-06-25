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

Route::get('/', 'HomeController@index')->name('index');

//*Shopping cart
Route::get('/add-to-cart/{id}', 'CartController@getAddToCart')->name('product.addToCart');
Route::middleware(['auth','user'])->group(function () {
Route::get('/profile', 'ProfileController@index')->name('profile');  
Route::get('/shopping-cart', 'CartController@getCart')->name('product.shoppingCart');
Route::get('/checkout', 'CartController@getCheckout')->name('checkout');
Route::post('/checkout', 'CartController@create')->name('order.create');
Route::get('/add/{id}', 'CartController@getAddByOne')->name('product.addByOne');
Route::get('/reduce/{id}', 'CartController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'CartController@getRemoveItem')->name('product.remove');

Route::get('/order', 'OrderController@getOrderByUser')->name('user.order');
//Route::get('/order', 'User\UserController@getOrder')->prefix('user')->name('user.order');

});

//* Mail
Route::get('/send', 'MailController@send');



// Route::middleware(['user', 'auth'])->prefix('user')->namespace('User')->name('user.')->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/user.register', 'UsersController@index')->name('user.index');
//     Route::post('/user.register', 'UsersController@create')->name('user.create');
//});

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UsersController@index')->name('users');


    //*admin/products
    // Route::prefix('products')->name('products.')->group(function(){
    //     Route::get('/', 'ProductController@index')->name('index');
    //     Route::post('/create', 'ProductController@create')->name('create');
    //     Route::patch('/edit', 'ProductController@edit')->name('edit');
    //     Route::delete('/delete', 'ProductController@delete')->name('destroy');
    // });
    Route::resource('products', 'ProductsController')->except(['show']);

    //*admin/category
    //  Route::prefix('categories')->name('categories.')->group(function(){ 
    //     Route::get('/', 'CategoriesController@index')->name('index');
    //     Route::get('/create','CategoriesController@create')->name('create');
    //         Route::patch('/edit', 'CatrgoriesController@edit')->name('edit');
    //         Route::delete('/delete', 'CatrgoriesController@delete')->name('destroy');
    // });
    Route::resource('categories', 'CategoriesController')->except(['show']);

    //*admin/orders
    //     Route::prefix('orders')->name('orders.')->group(function(){
    //         Route::get('/', 'OrdersController@index')->name('index');
    //         Route::post('/create', 'OrdersController@create')->name('create');
    //         Route::patch('/edit', 'OrdersController@edit')->name('edit');
    //         Route::delete('/delete', 'OrdersController@delete')->name('destroy');
    //     });

    //*admin/category
    //     Route::prefix('users')->name('users.')->group(function(){
    //         Route::get('/', 'Admin@index')->name('index');
    //         Route::get('/{id}', 'Admin@profile')->name('profile')->where('id', '[0-9]+');
    //         Route::delete('/delit', 'Admin@delete')->name('delit');
    //     });


});
