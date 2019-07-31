<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\XML;

class XmlFactory implements Factory
{
    public static function create()
    {
        return new XML();
    }
}