<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/23
 * Time: 19:46
 */

namespace App\Http\Controllers\Dashboard;


use App\Logic\Dashboard\ArticleLogic;
use App\Models\Dashboard\Article as ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function index()
    {
        $list = ArticleLogic::getList($limit = 20);
        return view('dashboard.articles.article_list')->with(['list' => $list]);
    }

    public function editOrAdd($id = 0)
    {
        $article = [];
        if ($id) $article = ArticleModel::getById($id);
        return view('dashboard.articles.article')->with(['article' => $article]);
    }

    public function postUpdateOrCreate(Request $request)
    {
        $data   = $request->all();
        $thumb  = $request->file('thumb');
        $result = ArticleLogic::updateOrCreateArticle($data,$thumb);
        if ($result !== false) {
            return $this->responseJSON([], 0, 'success !');
        }

        return $this->responseJSON($result, 1, 'bad request.');
    }

    public function postDelete($id)
    {
        $result = ArticleLogic::deleteArticle($id);
        if ($result !== false) {
            return $this->responseJSON([], 0, 'success !');
        }
        return $this->responseJSON([], 2, 'system error.');
    }

}