<?php
namespace Xiaohuilam\Laravel\SocialiteSkeleton\Exceptions\Traits;

trait DefaultTrait
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        if ($message !== null) {
            $this->message = $message;
        }
        if ($code !== null) {
            $this->code = $code;
        }
        parent::__construct($this->message, $this->code, $previous);
    }
}