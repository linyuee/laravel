<?php

namespace App\Http\Controllers;

use App\Jobs\test;

use App\Models\UserModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
//        $res = \Jwt::getToken(['user_id'=>'188','phone'=>'18826252068']);
//        var_dump($res);

        $res = \Jwt::getUserId();
        var_dump($res);


    }

    public static function test($name,callable $fun){
        return $fun($name);
    }
}
