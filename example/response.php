<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$response = new \PlugHttp\Response();

echo $response->json(['name' => 'Erandir']);