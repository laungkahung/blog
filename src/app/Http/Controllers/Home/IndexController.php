<?php

/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/9/19
 * Time: 17:01
 */

namespace App\Http\Controllers\Home;


class IndexController extends BaseController
{
    public function index()
    {
        $i = 1;
        return view('home.index');
    }
}