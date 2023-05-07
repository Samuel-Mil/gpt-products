<?php

namespace App\Core;

class Response
{
    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function setResponseCode(int $code)
    {
        return http_response_code($code);
    }
}
