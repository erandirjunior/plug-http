<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

session_start();

$_SESSION['name'] = 'Erandir';

$session = new \PlugHttp\Globals\Session();

var_dump($session->all());