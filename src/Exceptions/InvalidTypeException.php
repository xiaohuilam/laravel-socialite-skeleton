<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions;

use Exception;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\Traits\DefaultTrait;

class InvalidTypeException extends Exception
{
    use DefaultTrait;

    protected $message = "Invalid Socialite Type";
    protected $code = 1;
}