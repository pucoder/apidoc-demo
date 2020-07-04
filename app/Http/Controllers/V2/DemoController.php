<?php


namespace App\Http\Controllers\V2;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * @apiVersion 2.0.1
     * @apiGroup demos
     * @apiName v2-demos-demo1
     * @api post /v2/demos/demo1 v2-demo1
     * @apiDescription this is v2-demos-demo1
     *
     * this is also v2-demos-demo1
     *
     * this is still v2-demos-demo1
     *
     * @apiParam int field1 this is field1
     * @apiParam string [field2] this is field2
     * @apiSuccessExample successful response:
     * {
     *     "bool": true,
     *     "msg": "submitted successfully"
     * }
     */
    public function demo1(Request $request)
    {
        return response()->json(['bool' => true, 'msg' => 'submitted successfully', 'data' => $request->all()]);
    }

    /**
     * @apiVersion 2.0.1
     * @apiGroup demos
     * @apiName v2-demos-demo2
     * @api get /v2/demos/demo2 v2-demo2
     * @apiDescription this is v2-demos-demo2
     * @apiParam bool field1 this is field1
     * @apiParam json [field2] this is field2
     *
     * @apiErrorExample failure response:
     * {
     *   "bool": false,
     *   "msg": "submission failed"
     * }
     */
    public function demo2(Request $request)
    {
        return response()->json(['bool' => true, 'msg' => 'submission failed', 'data' => $request->all()]);
    }
}
