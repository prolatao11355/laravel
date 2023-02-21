<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('sample');
// });
// Route::get('/sum', function () {
//     $sum = 0;
//     for ($i = 1; $i <= 10;$i++){
//         $sum += $i;
//     }
//     return '1から10までの合計は'.$sum;
// });
// Route::get('/practice', function () {
//     $uri = Route::current()->uri();
//     return '現在のurl:' . $uri;
// });
// Route::get('blade_sample',function(){
//     $title='bladeテンプレートのサンプルです。';
//     $description='bladeテンプレートを利用すると、<br>HTML内にPHPの変数を埋め込むことができます。';
//     return view('samples.blade_sample', [
//         'title' => $title,
//         'description' => $description,
//         'direct' => '配列に直接文字列を書いても問題ありません'
//     ]);
// });
// Route::get('/sample_action', 'App\Http\Controllers\SampleController@sampleAction');
// Route::get('/about', function () {
//     $title = 'このアプリについて';
//     $title_content = 'このアプリはシンプルな掲示板です。';
//     $title2 = 'アプリの特徴';
//     $title2_contents = ['投稿を書き込むことができます。', '投稿を一覧表示できます。', 'その他色々あります。'];
//     return view('samples.about', [
//         'title' => $title,
//         'title_content' => $title_content,
//         'title2' => $title2,
//         'title2_contents' => $title2_contents
//     ]);
// });



// Route::get('/top_sample',function(){
//     return view('samples.top_sample',[
//         'title'=>'トップページ',
//     ]);
// });
// Route::get('/user_sample',function(){
//     return view('samples.user_sample',[
//         'title'=>'ユーザー設定',
//     ]);
// });
// Route::get('/privacy_sample',function(){
//     return view('samples.privacy_sample',[
//         'title'=>'プライバシーポリシー',
//     ]);
// });
// Route::get('/login_sample',function(){
//     return view('samples.login_sample',[
//         'title'=>'ログイン',
//     ]);
// });
// Route::get('/signup_sample',function(){
//     return view('samples.signup_sample',[
//         'title'=>'サインアップ',
//     ]);
// });

// Route::get('/@include',function(){
//     return view('@include.parent');
// });

// Route::get('/messages_sample/create', function () {
//     return view('messages_sample.create',[
//         'title'=>'新規投稿'
//     ]);
// });
// Route::get('/messages_sample/edit', function () {
//     return view('messages_sample.edit', [
//         'title' => '投稿を編集'
//     ]);
// });//->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

// Route::get('/single_action', 'App\Http\Controllers\SingleAction');

// Route::get('/show_profile', 'App\Http\Controllers\ShowProfile@show');

// Route::get('/route_parameter/{id}/{comment_id}', 'App\Http\Controllers\SampleController@routeParameter');

// Route::get('/request_form','App\Http\Controllers\SampleController@requestForm');
// Route::post('/request_sample','App\Http\Controllers\SampleController@requestSample');

// Route::get('/items/{id}','App\Http\Controllers\SampleController@showItem');

// Route::get('/form_practice', 'App\Http\Controllers\SampleController@formPractice');
// Route::post('/request_practice', 'App\Http\Controllers\SampleController@requestPractice');

// Route::get('/model_sample','App\Http\Controllers\SampleController@modelSample');

// Route::get('/messages','App\Http\Controllers\MessageController@index');
// Route::post('/messages', 'App\Http\Controllers\MessageController@store');

// Route::get('/validation_sample','App\Http\Controllers\SampleController@validationSampleForm');
// Route::post('/validation_sample','App\Http\Controllers\SampleController@validationSample');

// Route::get('/cookie_sample','App\Http\Controllers\SampleController@cookieSample');
// Route::post('/cookie_sample','App\Http\Controllers\SampleController@cookieDelete');

// Route::get('/session_sample', 'App\Http\Controllers\SampleController@sessionSample');
// Route::post('/session_sample', 'App\Http\Controllers\SampleController@sessionDelete');

// //Laravel基礎の提出課題
// //日記一覧画面
// Route::get('/diaries', 'App\Http\Controllers\DiaryController@index');
// //日記追加画面
// Route::get('/diaries/create', 'App\Http\Controllers\DiaryController@create');
// Route::post('/diaries', 'App\Http\Controllers\DiaryController@store');
// //日記編集画面
// Route::get('/diaries/{id}/edit', 'App\Http\Controllers\DiaryController@edit');
// Route::patch('/diaries/{id}', 'App\Http\Controllers\DiaryController@update');
// Route::delete('/diaries/{id}', 'App\Http\Controllers\DiaryController@destroy');

// //投稿一覧
// Route::get('/posts', 'App\Http\Controllers\PostController@index');
// //投稿追加フォーム
// Route::get('/posts/create', 'App\Http\Controllers\PostController@create');
// //投稿追加
// Route::post('/posts', 'App\Http\Controllers\PostController@store');
// //投稿詳細
// Route::get('/posts', 'App\Http\Controllers\PostController@show');
// //投稿更新フォーム
// Route::get('/posts/{id}/edit', 'App\Http\Controllers\PostController@edit');
// //投稿更新
// Route::patch('/posts/{id}', 'App\Http\Controllers\PostController@update');
// //投稿削除
// Route::delete('/posts', 'App\Http\Controllers\PostController@destroy');
// postsに関するリソースルーティングを行い、
// PostControllerの各アクションに紐づける
Route::resource('posts', 'App\Http\Controllers\PostController')->names('posts');
//Likeに関する
Route::resource('likes', 'App\Http\Controllers\LikeController')->only([
    'index','store','destroy'
]);
//Followに関する
Route::resource('follows', 'App\Http\Controllers\FollowController')->only([
    'index','store','destroy'
]);
Route::get('/follower', 'App\Http\Controllers\FollowController@followedIndex');
Route::get('/follow_mutual', 'App\Http\Controllers\FollowController@followMutual');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/{post}/edit_image', 'App\Http\Controllers\PostController@editImage')->name('posts.edit_image');
Route::patch('/posts/{post}/edit_image', 'App\Http\Controllers\PostController@updateImage')->name('posts.update_image');

// Route::get('/users/edit', 'App\Http\Controllers\UserController@edit')->name('users.edit');
// Route::patch('/users', 'App\Http\Controllers\UserController@update')->name('users.update');
// Route::get('/users/edit_image', 'App\Http\Controllers\UserController@editImage')->name('users.edit_image');
// Route::patch('/users/edit_image', 'App\Http\Controllers\UserController@updateImage')->name('users.update_image');
// Route::resource('users', 'App\Http\Controllers\UserController')->only([
//     'show',
// ])->names('users');

Route::resource('comments', 'App\Http\Controllers\CommentController')->only([
    'store','destroy'
])->names('comments');

Route::patch('/posts/{post}/toggle_like', 'App\Http\Controllers\PostController@toggleLike')->name('posts.toggle_like');


// ---------------------------------------------------
//                 課題
// --------------------------------------------------
Auth::routes();
//プロフィール
Route::get('/profile/edit', 'App\Http\Controllers\UserController@edit')->name('profile.edit');
Route::patch('/profile', 'App\Http\Controllers\UserController@update')->name('profile.update');
Route::get('/profile/edit_image', 'App\Http\Controllers\UserController@editImage')->name('profile.edit_image');
Route::patch('/profile/edit_image', 'App\Http\Controllers\UserController@updateImage')->name('profile.update_image');
Route::resource('profile', 'App\Http\Controllers\UserController')->only([
    'show',
    ])->names('profile');
    //出品商品の一覧
    Route::get('/users/{user}/exhibitions','App\Http\Controllers\ExhibitionController@index')->name('users.exhibitions');
    //出品商品の新規出品
    Route::get('/items/create','App\Http\Controllers\ItemController@create')->name('items.create');
    Route::post('/items/create','App\Http\Controllers\ItemController@store')->name('items.store');
//出品商品の情報を編集
Route::get('/items/{item}/edit','App\Http\Controllers\ItemController@edit')->name('items.edit');
Route::patch('/items/{item}/edit','App\Http\Controllers\ItemController@update')->name('items.update');
Route::get('/items/{item}/edit_image','App\Http\Controllers\ItemController@editImage')->name('items.edit_image');
Route::patch('/items/{item}/edit_image','App\Http\Controllers\ItemController@updateImage')->name('items.update_image');
Route::delete('/items/{item}/edit','App\Http\Controllers\ItemController@destroy')->name('items.destroy');
//トップページ
Route::get('/','App\Http\Controllers\ItemController@index')->name('top');
//お気に入り商品一覧
Route::patch('/{item}/toggle_like', 'App\Http\Controllers\LikeController@toggleLike')->name('likes.toggle_like');
Route::get('/likes','App\Http\Controllers\LikeController@index')->name('likes.index');
//購入確認画面
Route::get('/items/{item}','App\Http\Controllers\ItemController@show')->name('items.show');
Route::get('/items/{item}/order','App\Http\Controllers\OrderController@show')->name('order.show');
Route::patch('/items/{item}/order_confirmation','App\Http\Controllers\OrderController@showConfirmation')->name('order.show_confirmation');
Route::get('/items/{item}/order_completion','App\Http\Controllers\OrderController@completion')->name('order.completion');
