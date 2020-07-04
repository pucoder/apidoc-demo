<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * @apiVersion 1.0.1
     * @apiGroup tools
     * @apiName v1-tools-sendValidateSms
     * @api get /v1/tools/sendValidateSms v1-send validate sms
     * @apiDescription send sms verification code to user s mobile phone,This is a simulated sending SMS, I will return the verification code
     * @apiParam int mobile user phone number,the verification rule is：1[345789][0-9]{9}
     * @apiSampleRequest true
     */
    public function sendValidateSms(Request $request)
    {
        // 表单验证
        $validator = validator(
            $request->all(),
            [
                'mobile' => 'required|regex:/^1[345789][0-9]{9}$/'
            ],
            [
                'mobile.required' => 'mobile number cannot be empty',
                'mobile.regex' => 'malformed mobile number'
            ]
        );
        // 如果验证错误
        if ($validator->fails()) {
            // 返回第一条错误信息
            return response()->json(['bool' => false, 'msg' => $validator->errors()->all()[0]]);
        }

        $mobile = $request->get('mobile');

        if (Cache::has('code_' . $mobile)) {
            return response()->json(['bool' => false, 'msg' => 'Verification code has been sent, please check', 'captcha' => Cache::get('code_' . $mobile)]);
        }

        $code = rand(1000, 9999);
        Cache::put('code_' . $mobile, $code, 300);// 验证码5分钟后自动删除

        $send = true;// 短信是否发送成功
        if ($send) {
            return response()->json(['bool' => true, 'msg' => 'The verification code is sent successfully, and the valid time is 5 minutes!', 'captcha' => Cache::get('code_' . $mobile)]);
        }

        return response()->json(['bool' => false, 'msg' => 'failed to send verification code！']);
    }
}
