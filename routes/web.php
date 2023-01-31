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
    return view('sample');
});
Route::get('/sum', function () {
    $sum = 0;
    for ($i = 1; $i <= 10;$i++){
        $sum += $i;
    }
    return '1から10までの合計は'.$sum;
});
Route::get('/practice', function () {
    $uri = Route::current()->uri();
    return '現在のurl:' . $uri;
});
Route::get('blade_sample',function(){
    $title='bladeテンプレートのサンプルです。';
    $description='bladeテンプレートを利用すると、<br>HTML内にPHPの変数を埋め込むことができます。';
    return view('samples.blade_sample', [
        'title' => $title,
        'description' => $description,
        'direct' => '配列に直接文字列を書いても問題ありません'
    ]);
});
Route::get('/sample_action', 'App\Http\Controllers\SampleController@sampleAction');
Route::get('/about', function () {
    $title = 'このアプリについて';
    $title_content = 'このアプリはシンプルな掲示板です。';
    $title2 = 'アプリの特徴';
    $title2_contents = ['投稿を書き込むことができます。', '投稿を一覧表示できます。', 'その他色々あります。'];
    return view('samples.about', [
        'title' => $title,
        'title_content' => $title_content,
        'title2' => $title2,
        'title2_contents' => $title2_contents
    ]);
});



Route::get('/top_sample',function(){
    return view('samples.top_sample',[
        'title'=>'トップページ',
    ]);
});
Route::get('/user_sample',function(){
    return view('samples.user_sample',[
        'title'=>'ユーザー設定',
    ]);
});
Route::get('/privacy_sample',function(){
    return view('samples.privacy_sample',[
        'title'=>'プライバシーポリシー',
    ]);
});
Route::get('/login_sample',function(){
    return view('samples.login_sample',[
        'title'=>'ログイン',
    ]);
});
Route::get('/signup_sample',function(){
    return view('samples.signup_sample',[
        'title'=>'サインアップ',
    ]);
});

Route::get('/@include',function(){
    return view('@include.parent');
});

Route::get('/messages_sample/create', function () {
    return view('messages_sample.create',[
        'title'=>'新規投稿'
    ]);
});
Route::get('/messages_sample/edit', function () {
    return view('messages_sample.edit', [
        'title' => '投稿を編集'
    ]);
});//->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/single_action', 'App\Http\Controllers\SingleAction');

Route::get('/show_profile', 'App\Http\Controllers\ShowProfile@show');

Route::get('/route_parameter/{id}/{comment_id}', 'App\Http\Controllers\SampleController@routeParameter');

Route::get('/request_form','App\Http\Controllers\SampleController@requestForm');
Route::post('/request_sample','App\Http\Controllers\SampleController@requestSample');

Route::get('/items/{id}','App\Http\Controllers\SampleController@showItem');

Route::get('/form_practice', 'App\Http\Controllers\SampleController@formPractice');
Route::post('/request_practice', 'App\Http\Controllers\SampleController@requestPractice');

Route::get('/model_sample','App\Http\Controllers\SampleController@modelSample');

Route::get('/messages','App\Http\Controllers\MessageController@index');
Route::post('/messages', 'App\Http\Controllers\MessageController@store');