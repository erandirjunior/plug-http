<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\Json;

class JsonFactory implements Factory
{
    public static function create()
    {
        return new Json();
    }
}