<?php

namespace PlugHttp\Factory;

use PlugHttp\Body\Post;

class PostFactory implements Factory
{

    public static function create()
    {
        return new Post($_POST);
    }
}