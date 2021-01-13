<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

\Route::middleware(['api'])->group(function () {
    // 公共资源
    \Route::prefix('common')->group(function () {
        \Route::get('captcha', ['as'=>'captcha', 'uses'=>'CommonController@captcha']);
    });

    // 后台管理路由
    \Route::namespace('Admin')->prefix('admin')->as('admin::')->group(function () {
        \Route::as('auth.')->group(function () {
            \Route::post('login', ['as'=>'login', 'uses'=>'AuthController@login']);
        });
        // 需要授权的路由
        \Route::middleware(['auth'])->group(function () {
            \Route::as('user.')->prefix('user')->group(function () {
                \Route::post('detail', ['as'=>'detail', 'uses'=>'UserController@detail']);
            });
            \Route::as('menu.')->prefix('menu')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'MenuController@list']);
            });
            \Route::as('category.')->prefix('category')->group(function () {
                \Route::post('tree', ['as'=>'tree', 'uses'=>'CategoryController@tree']);
                \Route::post('add', ['as'=>'add', 'uses'=>'CategoryController@add']);
                \Route::post('edit', ['as'=>'edit', 'uses'=>'CategoryController@edit']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'CategoryController@delete']);
                \Route::post('upload', ['as'=>'upload', 'uses'=>'CategoryController@upload']);
            });
            \Route::as('label.')->prefix('label')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'LabelController@list']);
                \Route::post('add', ['as'=>'add', 'uses'=>'LabelController@add']);
                \Route::post('edit', ['as'=>'edit', 'uses'=>'LabelController@edit']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'LabelController@delete']);
                \Route::post('all', ['as'=>'all', 'uses'=>'LabelController@all']);
            });
            \Route::as('friendlink.')->prefix('friendlink')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'FriendlinkController@list']);
                \Route::post('add', ['as'=>'add', 'uses'=>'FriendlinkController@add']);
                \Route::post('edit', ['as'=>'edit', 'uses'=>'FriendlinkController@edit']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'FriendlinkController@delete']);
            });
            \Route::as('qiniu.')->prefix('qiniu')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'QiniuController@list']);
                \Route::post('upload', ['as'=>'upload', 'uses'=>'QiniuController@upload']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'QiniuController@delete']);
            });
            \Route::as('article.')->prefix('article')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'ArticleController@list']);
                \Route::post('add', ['as'=>'add', 'uses'=>'ArticleController@add']);
                \Route::post('edit', ['as'=>'edit', 'uses'=>'ArticleController@edit']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'ArticleController@delete']);
                \Route::post('detail', ['as'=>'detail', 'uses'=>'ArticleController@detail']);
                \Route::post('upload', ['as'=>'upload', 'uses'=>'ArticleController@upload']);
            });
            \Route::as('comment.')->prefix('comment')->group(function () {
                \Route::post('list', ['as'=>'list', 'uses'=>'CommentController@list']);
                \Route::post('delete', ['as'=>'delete', 'uses'=>'CommentController@delete']);
            });
            \Route::as('system.')->prefix('system')->group(function () {
                \Route::post('config', ['as'=>'config', 'uses'=>'SystemController@config']);
                \Route::post('save_config', ['as'=>'save_config', 'uses'=>'SystemController@saveConfig']);
                \Route::post('upload', ['as'=>'upload', 'uses'=>'SystemController@upload']);
            });
            \Route::as('statistics.')->prefix('statistics')->group(function () {
                \Route::post('home', ['as'=>'home', 'uses'=>'StatisticsController@home']);
            });
        });
    });

    // 前台展示路由
    \Route::namespace('Front')->prefix('front')->as('front::')->group(function () {
        \Route::as('label.')->prefix('label')->group(function () {
            \Route::post('cloud', ['as'=>'cloud', 'uses'=>'LabelController@cloud']);
        });
        \Route::as('article.')->prefix('article')->group(function () {
            \Route::post('hot', ['as'=>'hot', 'uses'=>'ArticleController@hot']);
            \Route::post('new', ['as'=>'new', 'uses'=>'ArticleController@new']);
            \Route::post('list', ['as'=>'list', 'uses'=>'ArticleController@list']);
            \Route::post('detail', ['as'=>'detail', 'uses'=>'ArticleController@detail']);
        });
        \Route::as('friendlink.')->prefix('friendlink')->group(function () {
            \Route::post('list', ['as'=>'list', 'uses'=>'FriendlinkController@list']);
        });
        \Route::as('system.')->prefix('system')->group(function () {
            \Route::post('about', ['as'=>'about', 'uses'=>'SystemController@about']);
            \Route::post('config', ['as'=>'config', 'uses'=>'SystemController@config']);
        });
        \Route::as('comment.')->prefix('comment')->group(function () {
            \Route::post('add', ['as'=>'add', 'uses'=>'CommentController@add']);
            \Route::post('list', ['as'=>'list', 'uses'=>'CommentController@list']);
        });
        \Route::as('category.')->prefix('category')->group(function () {
            \Route::post('tree', ['as'=>'tree', 'uses'=>'CategoryController@tree']);
        });
        \Route::as('visitor.')->prefix('visitor')->group(function () {
            \Route::post('track', ['as'=>'track', 'uses'=>'VisitorController@track']);
        });
    });
});

//\Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
