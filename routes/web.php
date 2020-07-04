<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return view('index');
//    return $router->app->version();
});

//第一版本
$router->group(['prefix' => 'v1', 'namespace' => 'V1'], function  () use ($router) {
    // Controllers Within The "App\Http\Controllers\V1" Namespace
    $router->post('demos/demo1', ['uses' => 'DemoController@demo1', 'as' => 'demos.demo1']);
    $router->get('demos/demo2', ['uses' => 'DemoController@demo2', 'as' => 'demos.demo2']);

    // 发送短信验证码
    $router->get('tools/sendValidateSms', ['uses' => 'ToolController@sendValidateSms', 'as' => 'tools.sendValidateSms']);
    // 用户手机登录
    $router->post('users/loginMobile', ['uses' => 'UserController@loginMobile', 'as' => 'users.loginMobile']);

    //需要api认证的路由（用户表必须有api_token字段）,在控制器中获取用户信息$request->user();
    $router->group(['middleware' => 'auth'], function  () use ($router) {
        // 更新用户token
        $router->post('users/updateToken', ['uses' => 'UserController@updateToken', 'as' => 'users.updateToken']);
        // 获取用户信息
        $router->get('users/getUser', ['uses' => 'UserController@getUser', 'as' => 'users.getUser']);
        // 上传文件
        $router->post('users/update', ['uses' => 'UserController@update', 'as' => 'users.update']);
    });
});

//第二版本
$router->group(['prefix' => 'v2', 'namespace' => 'V2'], function  () use ($router) {
    // Controllers Within The "App\Http\Controllers\V2" Namespace
    $router->post('demos/demo1', ['uses' => 'DemoController@demo1', 'as' => 'demos.demo1']);
    $router->get('demos/demo2', ['uses' => 'DemoController@demo2', 'as' => 'demos.demo2']);

    //需要api认证的路由（用户表必须有api_token字段）,在控制器中获取用户信息$request->user();
    $router->group(['middleware' => 'auth'], function  () use ($router) {

    });
});
