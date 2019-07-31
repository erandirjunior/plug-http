<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\FormData;

class FormDataFactory implements Factory
{
    public static function create()
    {
        return new FormData();
    }
}