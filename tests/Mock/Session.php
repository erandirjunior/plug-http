<?php

namespace PlugRoute\Test\Mock;

class Session extends \PlugHttp\Globals\Session
{
    public function __construct()
    {
        $_SESSION = [
            'name' => 'Erandir Junior',
            'age' => 23,
            'email' => 'aefs12junior@gmail.com'
        ];
        parent::__construct();
    }
}