<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$request = \PlugHttp\Request::create();

echo "URL: <br />";
var_dump($request->getUrl());

echo "<hr />";
echo "Body: <br />";
var_dump($request->bodyObject());


echo "<hr />";
echo "Body: <br />";
var_dump($request->all());

echo "<hr />";
echo "Query: <br />";
var_dump($request->query());

echo "<hr />";
echo "File: <br />";
var_dump($request->files());