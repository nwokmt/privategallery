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

//トップページ
Route::get('/', 'TopController@index')->name('top');
//商品詳細
Route::get('/detail/{id}', 'OrderController@detail')->where(['id'=>'[0-9]+']);
//商品追加
Route::get('/add/{id}', 'OrderController@add')->where(['id'=>'[0-9]+']);
//商品削除
Route::get('/remove/{id}', 'OrderController@remove')->where(['id'=>'[0-9]+']);
//カート
Route::get('/cart', 'OrderController@cart')->name('cart');
//注文
Route::get('/order', 'OrderController@order');
Route::post('/order/confirm', 'OrderController@confirm');
Route::post('/order/save', 'OrderController@save');
Route::get('/thanks', 'OrderController@thanks')->name('thanks');
//オーダーメイド注文
Route::get('/ordermade', 'OrdermadeController@order');
Route::post('/ordermade/confirm', 'OrdermadeController@confirm');
Route::post('/ordermade/save', 'OrdermadeController@save');
//thanks画面はorderと同じものを使う


//管理画面
Route::group(['prefix' => 'admin'], function() {
    //プロフィール詳細
    Route::get('profile', 'Admin\ProfileController@front')->name('front')->middleware('auth');
    //プロフィール編集
    Route::get('profile/edit', 'Admin\ProfileController@add')->name('profile')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    //商品一覧
    Route::get('item', 'Admin\ItemController@list')->name('item')->middleware('auth');
    //商品詳細
    Route::get('item/detail/{id}', ['as' => 'detail', 'uses' => 'Admin\ItemController@detail'])->where(['id'=>'[0-9]+'])->middleware('auth');
    //商品追加
    Route::get('item/add', ['as' => 'add', 'uses' => 'Admin\ItemController@add'])->middleware('auth');
    //商品編集
    Route::get('item/edit/{id}', ['as' => 'edit', 'uses' => 'Admin\ItemController@edit'])->where(['id'=>'[0-9]+'])->middleware('auth');
    //商品削除
    Route::get('item/delete/{id}', ['as' => 'delete', 'uses' => 'Admin\ItemController@delete'])->where(['id'=>'[0-9]+'])->middleware('auth');
    //商品保存
    Route::post('item/save', ['as' => 'save', 'uses' => 'Admin\ItemController@save'])->middleware('auth');

    //注文一覧
    Route::get('order', 'Admin\OrderController@list')->middleware('auth');
    //注文詳細
    Route::get('order/detail/{id}', ['as' => 'detail', 'uses' => 'Admin\OrderController@detail'])->where(['id'=>'[0-9]+'])->middleware('auth');
    //オーダーメイド注文一覧
    Route::get('ordermade/list', ['as' => 'list', 'uses' => 'Admin\OrdermadeController@list'])->middleware('auth');
    //オーダーメイド注文詳細
    Route::get('ordermade/detail/{id}', ['as' => 'detail', 'uses' => 'Admin\OrdermadeController@detail'])->where(['id'=>'[0-9]+'])->middleware('auth');

});
//管理者ログイン後ホーム
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

