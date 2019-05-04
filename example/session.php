<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

session_start();

$_SESSION['name'] = 'Erandir';

$session = \PlugHttp\Session::create();

var_dump($session->all());