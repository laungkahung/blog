<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/23
 * Time: 19:46
 */

namespace App\Http\Controllers\Dashboard;


class IndexController extends BaseController
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function articleList()
    {
        return view('dashboard.article_list');
    }

}