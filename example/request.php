<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$request = new \PlugHttp\Request();

echo "URL: <br />";
var_dump($request->getUrl());

echo "<hr />";
echo "Query: <br />";
var_dump($request->query());

echo "<hr />";
echo "File: <br />";
var_dump($request->file());