<?php

namespace App\Library\Jwt;

use Illuminate\Support\Facades\Facade;

class JwtFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Jwt';
    }
}