<?php

/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/9/19
 * Time: 17:01
 */

namespace App\Http\Controllers\Home;


use App\Logic\Dashboard\ArticleLogic;

class IndexController extends BaseController
{
    public function index()
    {
        $article_list = ArticleLogic::getListByFields(['title','thumb','excerpt']);
        return view('home.index', ['article_list' => $article_list]);
    }

    public function detail($id)
    {
        return view('home.detail');
    }
}