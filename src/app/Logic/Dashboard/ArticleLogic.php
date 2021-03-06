<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/27
 * Time: 12:16
 */

namespace App\Logic\Dashboard;


use App\Models\Dashboard\Article as ArticleModel;
use Illuminate\Support\Facades\Validator;

class ArticleLogic extends ArticleModel
{

    public static function updateOrCreateArticle($data, $thumb)
    {
        unset($data['thumb']);
        $validator = Validator::make($data, [
            'title' => 'required|max:80',
            'source' => 'required|max:20',
            'excerpt' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $errors->all();
        }

        if ($thumb) {
            $save_path = uploadImgToQiniuAndLocal($thumb, $is_exists = $data['has_thumb']);
            $data['thumb'] = $save_path;
        }

        return ArticleModel::updateOrCreateArticle($data, $data['id']); // TODO: Change the autogenerated stub
    }

    public static function getList($limit = 15)
    {
        return ArticleModel::getList($limit);
    }

    public static function getListByFields($fields = '*', $limit = 15)
    {
        return ArticleModel::getListByFields($fields, $limit);
    }

    public static function deleteArticle($id)
    {
        $article = self::where('id', $id)->firstOrFail();
        $result = $thumb = null;

        if ($article) {
            $thumb = $article->thumb;
            $result = $article->delete();//删除模型
        }

        if ($result && $thumb) {
            deleteImgFromQiniu($thumb);//删除七牛图片
            deleteImgFromStorage($thumb, 'article');//删除本地图片
        }

        return $result;
    }

}