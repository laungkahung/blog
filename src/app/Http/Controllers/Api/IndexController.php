<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/9/17
 * Time: 12:27
 */

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use QcloudImage\CIClient;

class IndexController extends BaseController
{
    function index()
    {
        $client  = CIClient::getInstance();
        $client->setTimeout(30);
        //单个或多个图片Url,识别身份证正面
        $data = $client->idcardDetect(array('urls'=>array(
            'http://imgs.focus.cn/upload/sz/5876/a_58758051.jpg',
            'http://img5.iqilu.com/c/u/2013/0530/1369896921237.jpg')),
            0);

        return $data;
    }

    function too()
    {
       return view('api.index');
    }

    function foo(Request $request)
    {
        $all = $request->all();
//        $client  = CIClient::getInstance();
//        $client->setTimeout(30);
//        $files    = $request->file('images');
//        $realPath = $files->getRealPath();
//        $data = $client->namecardDetect(array('files'=>array($realPath)), 1);
        return json_encode($all);
    }
}