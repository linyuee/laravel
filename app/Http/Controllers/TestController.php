<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $res = self::test('hello',function($name){
            return 'your name is '.$name;
        });
        var_dump($res)
    }

    public static function test($name,callable $fun){
        return $fun($name);
    }
}
