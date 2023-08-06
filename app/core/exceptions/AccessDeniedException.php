<?php

namespace app\core\exceptions;

class AccessDeniedException extends \Exception{
    
    protected $message = "Access denied. You don't have permission to access this page.";
    protected $code = 403;

    
}