<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/27
 * Time: 14:04
 */

namespace App\Models\Dashboard;


class Article extends Base
{
    protected $table = 'article';

    protected $fillable = ['title', 'keywords','source','excerpt','content','thumb','istop','recommended','publish_status'];

    public static function createArticle($data)
    {
        $article           = new self;
        $article->title    = $data['title'];
        $article->keywords = $data['keywords'];
        $article->source   = $data['source'];
        $article->excerpt  = $data['excerpt'];
        $article->content  = $data['content'];

        isset($data['thumb']) && $article->thumb = $data['thumb'];
        isset($data['istop']) ? $article->istop = 1 : $article->istop = 0;
        isset($data['recommended']) ? $article->recommended = 1 : $article->recommended = 0;
        isset($data['publish_status']) ? $article->publish_status = 1 : $article->publish_status = 0;

        if ($article->save()) {
            return $article;
        }
        return null;
    }

    public static function updateOrCreateArticle($data,$id)
    {
        $saveData = [];
        isset($data['title']) && $saveData['title'] = $data['title'];
        isset($data['keywords']) && $saveData['keywords'] = $data['keywords'];
        isset($data['source']) && $saveData['source'] = $data['source'];
        isset($data['excerpt']) && $saveData['excerpt'] = $data['excerpt'];
        isset($data['content']) && $saveData['content'] = $data['content'];
        isset($data['thumb']) && $saveData['thumb'] = $data['thumb'];
        isset($data['istop']) ? $saveData['istop'] = 1 : $saveData['istop'] = 0;
        isset($data['recommended']) ? $saveData['recommended'] = 1 : $saveData['recommended'] = 0;
        isset($data['publish_status']) ? $saveData['publish_status'] = 1 : $saveData['publish_status'] = 0;
        $result = self::updateOrCreate(['id' => $id], $saveData);

        if ($result) {
            return $result;
        }
        return null;
    }

    public static function getById($id)
    {
        $data = self::where('id', $id)->firstOrFail();
        if($data !== null) {
            $data->has_thumb = $data->thumb;
            $data->thumb     = imgShowPath($data->thumb);
        }
        return $data;
    }

    public static function getList($limit = 15)
    {
        return self::orderBy('id','desc')->paginate($limit);
    }

    /**
     * @param string $fields
     * @param int $limit
     * @return mixed
     */
    public static function getListByFields($fields = '*', $limit = 15)
    {
        return self::orderBy('id','desc')->select($fields)->paginate($limit);
    }

}