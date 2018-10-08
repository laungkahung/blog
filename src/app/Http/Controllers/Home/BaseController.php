<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/9/19
 * Time: 17:01
 */

namespace App\Http\Controllers\Home;


use App\Exceptions\JsonHandler;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function jsonResponse($data = null)
    {
        if ($data) {
            return $this->successReturn($data);
        }
        return $this->failReturn('require fail', $data);
    }

    /**
     * 成功返回
     * @param $data
     * @return \think\response\Json
     */
    protected function successReturn($data = null)
    {
        return JsonHandler::successReturn($data);
    }

    /**
     * 失败返回
     * @param $msg
     * @param null $data
     * @return \think\response\Json
     */
    protected function failReturn($msg, $data = null)
    {
        return JsonHandler::failReturn($msg, $data);
    }
}