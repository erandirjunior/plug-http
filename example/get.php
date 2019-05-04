<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$get = \PlugHttp\Get::create();

var_dump($get->all());
$get->remove('teste');
var_dump($get->all());