<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\FormUrlEncoded;

class FormUrlEncodedFactory implements Factory
{
    public static function create()
    {
        return new FormUrlEncoded();
    }
}