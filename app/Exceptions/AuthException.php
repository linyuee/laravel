<?php
/**
 * Created by PhpStorm.
 * User: linyuee
 * Date: 2019/5/11
 * Time: 2:58 PM
 */

namespace App\Exceptions;


use Throwable;

class AuthException extends \Exception
{
    public function __construct(string $message = "", int $code = 3, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}