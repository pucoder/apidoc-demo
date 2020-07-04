<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * @apiVersion 1.0.1
     * @apiGroup demos
     * @apiName v1-demos-demo1
     * @api post /v1/demos/demo1 v1-demo1
     * @apiDescription this is v1-demos-demo1
     *
     * this is also v1-demos-demo1
     *
     * this is still v1-demos-demo1
     *
     * @apiParam int field1 this is field1
     * @apiParam string [field2] this is field2
     * @apiSuccessExample successful response:
     * {
     *     "bool": true,
     *     "msg": "submitted successfully"
     * }
     * @apiSampleRequest true
     */
    public function demo1(Request $request)
    {
        return response()->json(['bool' => true, 'msg' => 'submitted successfully', 'data' => $request->all()]);
    }

    /**
     * @apiVersion 1.0.1
     * @apiGroup demos
     * @apiName v1-demos-demo2
     * @api get /v1/demos/demo2 v1-demo2
     * @apiDescription this is v1-demos-demo2
     * @apiParam bool field1 this is field1
     * @apiParam json [field2] this is field2
     *
     * @apiErrorExample failure response:
     * {
     *   "bool": false,
     *   "msg": "submission failed"
     * }
     * @apiSampleRequest true
     */
    public function demo2(Request $request)
    {
        return response()->json(['bool' => true, 'msg' => 'submission failed', 'data' => $request->all()]);
    }
}
