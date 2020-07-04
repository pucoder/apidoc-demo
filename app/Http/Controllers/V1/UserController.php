<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @apiVersion 1.0.1
     * @apiGroup users
     * @apiName V1-users-loginMobile
     * @api post /v1/users/loginMobile v1-user phone login
     * @apiDescription Mobile phone number login, if the mobile phone number is not registered, it will automatically register and log in
     * @apiParam int mobile user phone number
     * @apiParam int captcha sms verification code, get it by v1-send validate sms
     * @apiSampleRequest true
     */
    public function loginMobile(Request $request)
    {
        $mobile = $request->get('mobile');
        $captcha = $request->get('captcha');
        // 表单验证
        $validator = validator(
            $request->all(),
            [
                'mobile' => [
                    'required',
                    'regex:/^1[345789][0-9]{9}$/'
                ],
                'captcha' => [
                    'required',
                    'numeric',
                    'regex:/^'.Cache::get('code_' . $mobile).'$/',
                ]
            ],
            [
                'mobile.required' => 'mobile number cannot be empty',
                'mobile.regex' => 'malformed mobile number',
                'captcha.required' => 'verification code must be filled',
                'captcha.numeric' => 'verification code format error',
                'captcha.regex' => 'verification code error',
            ]
        );
        // 如果表单验证错误
        if ($validator->fails()) {
            // 返回第一条错误信息
            return response()->json(['bool' => false, 'msg' => $validator->errors()->all()[0]]);
        }
        // 开始登录
        try {
            $user = User::where('mobile', $mobile)->first();
            $str = Str::random(80);
            if ($user) {
                $user->forceFill(['api_token' => $str])->save();
            } else {
                $user = new User();
                $user->mobile = $mobile;
                $user->api_token = $str;
                $user->save();
            }
            // 删除验证码
            Cache::forget('code_' . $mobile);
            $headers = ['Authorization' => 'Bearer ' . $str];
            // 将用户api_token返回到响应头
            return response()->json(['bool' => true, 'msg' => 'login successful', 'api_token' => $str], 200, $headers);
        } catch (\Exception $exception) {
            return response()->json(['bool' => false, 'msg' => $exception->getMessage()]);
        }
    }

    /**
     * @apiVersion 1.0.1
     * @apiGroup users
     * @apiName V1-users-updateToken
     * @api post /v1/users/updateToken v1-update user credentials
     * @apiDescription get new credentials from old credentials
     * @apiHeader string Authorization User authorization credentials, get it by v1-user phone login, pay attention to spaces
     * @apiHeaderExample request header example:
     * {
     *   "Authorization":"Bearer ......"
     * }
     * @apiSampleRequest true
     */
    public function updateToken(Request $request)
    {
        $user = $request->user();
        $str = Str::random(80);
        $user->forceFill(['api_token' => $str])->save();

        $headers = ['Authorization' => 'Bearer ' . $str];
        return response()->json(['bool' => true, 'msg' => 'update completed', 'api_token' => $str], 200, $headers);
    }

    /**
     * @apiVersion 1.0.1
     * @apiGroup users
     * @apiName V1-users-getUser
     * @api get /v1/users/getUser v1-get user information
     * @apiDescription Pass api_token in request header to get user information
     * @apiHeader string Authorization User authorization credentials, get it by v1-user phone login, pay attention to spaces
     * @apiHeaderExample request header example:
     * {
     *   "Authorization":"Bearer ......"
     * }
     * @apiSampleRequest true
     */
    public function getUser(Request $request)
    {
        return response()->json(['bool' => true, 'msg' => 'get success', 'data' => $request->user()]);
    }

    /**
     * @apiVersion 1.0.1
     * @apiGroup users
     * @apiName V1-users-update
     * @api post /v1/users/update v1-update user information
     * @apiDescription update user information
     * @apiHeader string Authorization User authorization credentials, get it by v1-user phone login, pay attention to spaces
     * @apiHeaderExample request header example:
     * {
     *   "Authorization":"Bearer ......"
     * }
     * @apiParam string name this is the name
     * @apiParam string email this is the email
     * @apiParam file avatar this is avatar
     * @apiSampleRequest true
     */
    public function update(Request $request)
    {
        try {
            $user = $request->user();
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::url($request->file('avatar')->store('files'));
            }
            if ($user->fill($data)->save()) {
                return response()->json(['bool' => true, 'msg' => 'uploaded successfully', 'data' => $user]);
            }

            return response()->json(['bool' => false, 'msg' => 'upload failed']);
        } catch (\Exception $exception) {
            return response()->json(['bool' => false, 'msg' => $exception->getMessage()]);
        }
    }
}
