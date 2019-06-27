<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions;

use Exception;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\Traits\DefaultTrait;

class UserMismatchException extends Exception
{
    use DefaultTrait;

    protected $message = "User mismatch";
    protected $code = 1;
}