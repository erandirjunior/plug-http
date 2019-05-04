<?php

namespace PlugHttp;

use PlugHttp\Body\Body;
use PlugHttp\Body\Content;
use PlugHttp\Globals\GlobalFile;
use PlugHttp\Globals\GlobalGet;
use PlugHttp\Globals\GlobalServer;

class Request
{
	public static function create()
	{
		$get 		= Get::create();
		$file 		= File::create();
		$server 	= Server::create();
		$content 	= (new Content($server))->getBody();
		return self::createRequest($get, $content, $server, $file);
	}

	public static function createRequest(
		GlobalGet $get,
		$content,
		GlobalServer $server,
		GlobalFile $file
	)
	{
		return new \PlugHttp\Globals\GlobalRequest($content, $get, $file, $server);
	}
}