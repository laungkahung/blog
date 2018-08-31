<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/23
 * Time: 19:47
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function responseJSON(array $data, $code = 0, $msg = 'ok')
    {
        $data['code'] = $code;
        $data['msg']  = $msg;
        return response()->json($data);
    }

}