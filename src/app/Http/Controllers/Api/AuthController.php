<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class AuthController extends BaseController
{
    //
    function login(Request $request){
        return $this->jsonResponse();
    }
}
