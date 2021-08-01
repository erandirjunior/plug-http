<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$get = new \PlugHttp\Globals\Get();

var_dump($get->all());
$get->remove('teste');
var_dump($get->all());