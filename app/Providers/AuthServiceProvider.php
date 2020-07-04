<?php

namespace App\Providers;

use App\Http\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            $api_token = $this->getHeaderApiToken($request);
            if ($api_token) {
                return User::where('api_token', $api_token)->first();
            }
        });
    }

    /**
     * 获取请求头用户的凭证
     *
     * @param object $request 请求信息
     * @return mixed|string
     */
    public static function getHeaderApiToken($request)
    {
        $Authorization = $request->header('Authorization');

        if ($Authorization) {
            $Authorization = explode(" ", $Authorization);
            if (isset($Authorization[1])) {
                return $Authorization[1];
            }
        }

        return null;
    }
}
