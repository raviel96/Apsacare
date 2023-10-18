<?php
namespace app\core;
class Response {
    
    /**
     * Set the http response code
     * @param int $code Response code
     */
    public function setStatusCode(int $code) {
            http_response_code($code);

    }
    
    /**
     * Redirect to the specified url
     * @param string $url Path of the location
     */
    public function redirect(string $url) {
        header("Location: " .$url);
    }
}