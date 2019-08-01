<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\TextPlain;

class TextPlainFactory implements Factory
{
    public static function create()
    {
        return new TextPlain();
    }
}