<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; 
use App\Http\Controllers\UserController; 
use App\Http\Middleware\CheckAge;
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
    return view('welcome');
});

Route::get('/hello', 'MainController@index');
//Route::get('/hello', 'App\Http\Controllers\MainController@index');

Route::get('/hello-world', function(){
    return view('hello-world');
});

// route co tham so dau vao 

/*
Route::get('/hello-world/{year}', function($year){
    echo ('Hello world, ' . $year);
});



Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    if($yourname == null){
        echo ('Hello world, ' . $year);
    }else{
        echo ('Hello world, ' . $year . '. My name is ' . $yourname);
    }
    // return view('hello-world');
});

*/ 


Route::get('/hello-world/{year}/{yourname?}', function($year, $yourname = null){
    $hello_string = '';
    if($yourname == null){
        $hello_string = 'Hello world, ' . $year;
    }else{
        $hello_string = 'Hello world, ' . $year . '. My name is ' . $yourname;
    }
    return view('hello-world')->with('hello_str', $hello_string);
});

/*
Route::get('/dashboard', function () {
    echo "Create midleware successful!";
})->middleware('checkage');
*/ 



Route::get('/dashboard', function () {
    echo "Create midleware successful!";
})->middleware(CheckAge::class);

Route::get('/role',[
    'middleware' => 'role:superadmin',
    'uses' => 'App\Http\Controllers\MainController@checkRole',
 ]);

 //Route::get('/tin-tuc/{news_id_string}', 'MainController@showNews'); declare old style of route 

Route::get('/tin-tuc/{news_id_string}', [MainController::class, 'showNews']);  // declare new style of route 

Route::get('profile', 'UserController@show')->middleware('auth');


Route::get('/controller-middleware', [
    'middleware' => 'First',
    'uses'       => 'App\Http\Controllers\TestController@testControllerMiddleware'
 ]);

 Route::resource('/photos', 'PhotoController');


/*
Route::resource('photo', 'PhotoController', ['only' => [
    'index', 'show'
]]);

Route::resource('photo', 'PhotoController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);
*/ 

Route::get('user-info', 'App\Http\Controllers\MainController@getUserInfo');

Route::get('contact', 'App\Http\Controllers\ContactController@showContactForm');

Route::post('contact', 'App\Http\Controllers\ContactController@insertMessage');

Route::get('/basic-response-string', function () {
    return 'Hello World';
});

Route::get('/basic-response-json', function () {
    $info = ['name' => 'All Laravel', 'version' => 'Laravel 5.4', 'website' => 'http://allaravel.com'];
    return $info;
});

Route::get('test-view', function(){
    return view('fontend.test-view');
  });


  use Illuminate\Support\Facades\View;

  Route::get('contact', function(){
    if (View::exists('fontend.contact')) {
        return view('fontend.contact');
    } else {
      return 'Trang liên hệ đang bị lỗi, bạn vui lòng quay lại sau';
    }
  });


  Route::get('first-blade-example', function(){
    return view('fontend.first-blade-example');
  });

  Route::get('components', function () {
    return view('fontend.component-example');
});


Route::get('second-blade-example', function(){
    $comment = 'Tôi là <span class="label label-success">All Laravel</span>'; 
    return view('fontend.second-blade-example')->with('comment', $comment);
});



Route::get('news', function(){
    $news_list = array(
      ['title' => 'Bài viết số 1', 'content' => 'Nội dung bài viết 1', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 2', 'content' => 'Nội dung bài viết 2', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 3', 'content' => 'Nội dung bài viết 3', 'post_date' => '2017-01-03'],
      ['title' => 'Bài viết số 4', 'content' => 'Nội dung bài viết 4', 'post_date' => '2017-01-03']
      );
    return view('fontend.news-list')->with(compact('news_list'));
  });



  Route::get('user/create', 'App\Http\Controllers\UserController@showRegisterForm')->name('user.create');
  Route::post('user/create', 'App\Http\Controllers\UserController@storeUser');

  Route::get('user/list', 'App\Http\Controllers\UserController@getlist')->name('user.list');
  Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');  // declare new style of route 