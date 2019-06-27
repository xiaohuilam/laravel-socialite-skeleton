<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions;

use Exception;
use Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\Traits\DefaultTrait;

class DuplicateBindingsException extends Exception
{
    use DefaultTrait;

    protected $message = "Duplicate bindings";
    protected $code = 1;
}