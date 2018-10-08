<?php
/**
 * Created by PhpStorm.
 * User: marki
 * Date: 18-10-8
 * Time: 上午10:25
 */

namespace App\Http\Controllers\Home;


class ApiController extends BaseController
{
    public function articleList(){

        return $this->jsonResponse();
    }

}