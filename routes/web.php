<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send', 'MailController@send');



// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(['namespace' => 'Admin'], function(){
//     Route::get('/',' Admin@index')->name('dashboard');


    //*admin/products
//     Route::prefix('products')->name('products.')->group(function(){
//         Route::get('/', 'Adminr@index')->name('index');
//         Route::post('/create', 'Admin@create')->name('create');
//         Route::patch('/edit', 'Admin@edit')->name('edit');
//         Route::delete('/delete', 'Admin@delete')->name('delete');
//     });

    //*admin/category
//      Route::prefix('category')->name('category.')->group(function(){ 
//         Route::get('/', 'Admin@index')->name('index');
//         Route::post('/create', 'Admin@create')->name('create');
//         Route::patch('/edit', 'Admin@edit')->name('edit');
//         Route::delete('/delete', 'Admin@delete')->name('delete');
//      });

    //*admin/orders
//     Route::prefix('orders')->name('orders.')->group(function(){
//         Route::get('/', 'Admin@index')->name('index');
//         Route::post('/create', 'Admin@create')->name('create');
//         Route::patch('/edit', 'Admin@edit')->name('edit');
//         Route::delete('/delete', 'Admin@delete')->name('delete');
//     });

    //*admin/category
//     Route::prefix('users')->name('users.')->group(function(){
//         Route::get('/', 'Admin@index')->name('index');
//         Route::get('/{id}', 'Admin@profile')->name('profile')->where('id', '[0-9]+');
//         Route::delete('/delit', 'Admin@delete')->name('delit');
//     });


// });

















