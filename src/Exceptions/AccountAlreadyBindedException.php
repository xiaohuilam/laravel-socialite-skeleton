<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions;

use Exception;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\Traits\DefaultTrait;

class AccountAlreadyBindedException extends Exception
{
    use DefaultTrait;

    protected $message = "Account Already Binded";
    protected $code = 1;
}