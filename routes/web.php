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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::get('/detail/{id}', [
    'uses' => 'ProductController@getDetail',
    'as' => 'product.detail'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddtoCart',
    'as' => 'product.AddtoCart'
]);

Route::get('/go-to-checkout/{id}', [
    'uses' => 'ProductController@toCheckout',
    'as' => 'product.toCheckout'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduce'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemove',
    'as' => 'product.remove'
]);

Route::get('/cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.cart'
]);

Route::get('/search', [
    'uses' => 'ProductController@search',
    'as' => 'product.search'
]);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/signup', [
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    Route::get('/signin', [
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);

    Route::get('/forgot-password', [
        'uses' => 'UserController@resetPassword',
        'as' => 'user.forgot'
    ]);
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);

    Route::get('/profile/change-info', [
        'uses' => 'UserController@changeInfo',
        'as' => 'user.change'
    ]);

    Route::post('/profile/change-info/{id}', [
        'uses' => 'UserController@updateInfo',
        'as' => 'user.update'
    ]);

    Route::get('/profile/change-password', [
        'uses' => 'UserController@changePass',
        'as' => 'user.changePass'
    ]);

    Route::post('/profile/change-password/update', [
        'uses' => 'UserController@updatePass',
        'as' => 'user.updatePass'
    ]);

    Route::get('/myorder', [
        'uses' => 'UserController@getOrder',
        'as' => 'user.order'
    ]);

    Route::get('/myorder/tf', [
        'uses' => 'UserController@getOrderT',
        'as' => 'user.order2'
    ]);

    Route::post('/myorder/cc/{id}',[
        'uses' => 'UserController@storeSelesaiCC',
        'as' => 'cc.finish'
    ]);

    Route::post('/myorder/tf/{id}',[
        'uses' => 'UserController@storeSelesaiTF',
        'as' => 'tf.finish'
    ]);

    Route::get('/checkout',[
        'uses' => 'CheckoutController@index',
        'as' => 'checkout'
    ]);

    Route::get('/checkout/transfer',[
        'uses' => 'CheckoutController@getTransfer',
        'as' => 'transfer.checkout'
    ]);

    Route::post('/checkout/transfer/store',[
        'uses' => 'CheckoutController@postTransfer',
        'as' => 'transfer.postcheckout'
    ]);

    Route::post('/checkout/store',[
        'uses' => 'CheckoutController@storeCheckout',
        'as' => 'storecheckout'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', [
        'uses' => 'adminController@getDashboard',
        'as' => 'admin.index'
    ]);
    Route::get('/admin/allproduct', [
        'uses' => 'adminController@getProducts',
        'as' => 'admin.allproduct'
    ]);
    Route::get('/admin/allproduct/addproduct', [
        'uses' => 'adminController@addProduct',
        'as' => 'admin.addproduct'
    ]);
    Route::post('/admin/allproduct/storeproduct', [
        'uses' => 'adminController@storeProduct',
        'as' => 'admin.storeproduct'
    ]);
    Route::put('/admin/allproduct/update/{id}', [
        'uses' => 'adminController@updateProduct',
        'as' => 'product.update'
    ]);
    Route::get('/admin/allproduct/delete/{id}', [
        'uses' => 'adminController@delProduct',
        'as' => 'product.delProduct'
    ]);
    Route::get('/admin/sliders', [
        'uses' => 'adminController@showSlider',
        'as' => 'admin.slider'
    ]);
    Route::get('/admin/addslider', [
        'uses' => 'adminController@addSlider',
        'as' => 'admin.addslider'
    ]);
    Route::post('/admin/storeslider', [
        'uses' => 'adminController@storeSlider',
        'as' => 'admin.storeslider'
    ]);
    Route::get('/admin/delete/{id}', [
        'uses' => 'adminController@deleteSlider',
        'as' => 'admin.deleteSlider'
    ]);
    Route::put('/admin/update/{id}', [
        'uses' => 'adminController@updateSlider',
        'as' => 'admin.updateSlider'
    ]);
    Route::get('/transfer/orders', [
        'uses' => 'adminController@getOrder',
        'as' => 'admin.order'
    ]);
    Route::get('/credit/orders', [
        'uses' => 'adminController@getCC',
        'as' => 'credit.order'
    ]);
    Route::get('/credit/orders/kirim', [
        'uses' => 'adminController@getCC2',
        'as' => 'credit.order2'
    ]);
    Route::get('/transfer/orders/kirim', [
        'uses' => 'adminController@getOrder2',
        'as' => 'admin.order2'
    ]);
    Route::get('/transfer/orders/selesai', [
        'uses' => 'adminController@getOrder3',
        'as' => 'admin.order3'
    ]);
    Route::post('admin/accept/{id}',[
        'uses' => 'adminController@storeToAccept',
        'as' => 'send'
    ]);
    Route::post('credit/accept/{id}',[
        'uses' => 'adminController@storeAcceptCC',
        'as' => 'send.credit'
    ]);
    Route::get('/credit/orders/selesai', [
        'uses' => 'adminController@getCC3',
        'as' => 'credit.order3'
    ]);
});
