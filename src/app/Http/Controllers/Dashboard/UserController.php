<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/24
 * Time: 18:06
 */

namespace App\Http\Controllers\Dashboard;


class UserController extends BaseController
{
    public function index()
    {
        return view('dashboard.users.user');
    }
}