<?php


/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/30
 * Time: 17:46
 */


use Illuminate\Support\Facades\Storage;
use Qiniu\Auth;

const ARTICLE_DEFAULT_IMG = 'http://pe5ror07a.bkt.clouddn.com/article.png';//文章默认图片显示路径


/**
 * 删除七牛云上对应图片
 * @param $key
 * @return mixed
 */
function deleteImgFromQiniu($key)
{
    $auth = new Auth(getenv('QINIU_ACCESS_KEY'), getenv('QINIU_SECRET_KEY'));
    $config = new \Qiniu\Config();
    $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);
    return $bucketManager->delete(getenv('QINIU_BLOG_BUCKET'), $key);
}

/**
 * 删除storage 对应文件
 * @param $path
 * @param $disk
 * @return bool
 */
function deleteImgFromStorage($path,$disk)
{
    return Storage::disk($disk)->delete($path);
}

/**
 * 上传图片到 qiniu and local
 * @param $thumb
 * @param $is_exists
 * @return null
 */
function uploadImgToQiniuAndLocal($thumb,$is_exists)
{
    $disk_storage = Storage::disk('article'); //本地储存位置
    $disk_qiniu   = Storage::disk('qiniu'); //七牛云

    if ($is_exists) {//存在
        deleteImgFromStorage($is_exists,'article');// 删除本地
        deleteImgFromQiniu($is_exists);// 删除七牛
    }

    $dir = date('Ymd');
    $filename_qiniu = $disk_qiniu->put($dir, $thumb);//上传到七牛
    $filename_local = $disk_storage->putFile($dir, $thumb);//上传到本地
    if (!$filename_qiniu || !$filename_local) { return null; }

    return $filename_local;
}

/**
 * 拼接成七牛云全路径
 * @param $path
 * @return string
 */
function imgShowPath($path)
{
    return empty($path) ? ARTICLE_DEFAULT_IMG : getenv('QINIU_BLOG_URl') . '/' . $path;
}
