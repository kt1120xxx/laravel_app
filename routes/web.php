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

/*
|--------------------------------------------------------------------------
| タスク管理,英語学習アプリ(laravel,vue)
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'routine'], function() {
    Route::get('/','RoutinesController@index')->name('routinetop');
    Route::get('/create','RoutinesController@create');
    Route::get('/show/{routineid}','RoutinesController@show');
    Route::post('/routineCreate','RoutinesController@store');
    Route::post('/searchWeek/{searchWeek}','RoutinesController@searchWeek');
    Route::get('/edit/{routineid}','RoutinesController@edit');
    Route::get('/destroy/{routineid}','RoutinesController@destroy');
    Route::put('/update/{routineid}',
        ['as'=>'routine.update','uses' => 'RoutinesController@update'
    ]);    
});

Route::group(['prefix' => 'task'], function() {
    Route::get('/','TasksController@index')->name('tasktop');
    Route::get('/deleteList','TasksController@deleteList');
    Route::get('/create','TasksController@create');
    Route::post('/taskCreate','TasksController@store');
    Route::get('/show/{taskid}','TasksController@show');
    Route::get('/edit/{taskid}','TasksController@edit');
    Route::get('/destroy/{taskid}','TasksController@destroy');
    Route::get('/restoration/{taskid}','TasksController@restoration');
    Route::put('/update/{taskid}',
        ['as'=>'task.update','uses' => 'TasksController@update'
    ]);
});

Route::group(['prefix' => 'english_practice'], function() {
    Route::get('/','EnglishPracticesController@index')->name('english_practicetop');
    Route::post('/list','EnglishPracticesController@list');
    Route::post('/cerruntList','EnglishPracticesController@cerruntList');
    Route::post('/priorityList/{priority}','EnglishPracticesController@priorityList');
    Route::post('/complete/{id}','EnglishPracticesController@complete');
    Route::post('/completeList','EnglishPracticesController@completeList');
    Route::post('/returnItem/{id}','EnglishPracticesController@returnItem');
    Route::get('/create','EnglishPracticesController@create');
    Route::post('/newEnglish','EnglishPracticesController@store');
});



/*
|--------------------------------------------------------------------------
| laravel掲示板
|--------------------------------------------------------------------------
|
*/

// welcome画面
Route::get('/', function () {
    return view('welcome');
});

// 仮登録
Auth::routes(['verify'=>true]);

// 会員登録後メール確認を促す
Route::get('/verify',  function(){
    return view('auth/verify');
});

// ホーム画面(投稿一覧表示)
Route::get('/home','PostsController@index')->name('top')/*->middleware('auth')*/;

// CRUD処理
Route::resource('posts','PostsController',
    ['only'  =>['create','store','show','edit','update','destroy']]
)/*->middleware('auth')*/;



/*
|--------------------------------------------------------------------------
| vue掲示板
|--------------------------------------------------------------------------
|
*/

// 一覧表示用
Route::get('/vue-top','PostsController@vueTop')/*->middleware('auth')*/;

// vue掲示板のAPI取得処理(jsonデータを返すのみのメソッド)
Route::get('/apitest','PostsController@apiTest')/*->middleware('auth')*/;

// vue掲示板データ新規作成
Route::post('/api/topics','PostsController@topics')/*->middleware('auth')*/;

// vue掲示板データ編集
Route::post('/api/topics/update/{updateId}/{updateTitle}/{updateBody}','PostsController@topicsUpdate')/*->middleware('auth')*/;

// vue掲示板データ削除
Route::post('/api/topics/delet/{deleteId}','PostsController@topicsDelete')/*->middleware('auth')*/;

// vue掲示板検索
Route::post('/api/topics/search/{searchTitle}','PostsController@topicSearch')/*->middleware('auth')*/;

// vue掲示板検索ページネーションテスト
Route::get('/vue','PostsController@vue')/*->middleware('auth')*/;



/*
|--------------------------------------------------------------------------
| 練習用
|--------------------------------------------------------------------------
|
*/

// props、emitを検索処理処理で練習
Route::get('/sample','PostsController@sample')/*->middleware('auth')*/;

// scss、jquery練習
Route::get('/sass', function () {
    return view('sass');
});