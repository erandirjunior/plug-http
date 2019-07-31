<?php

namespace PlugHttp\Body;

use PlugHttp\Factory\FormDataFactory;
use PlugHttp\Factory\FormUrlEncodedFactory;
use PlugHttp\Factory\JsonFactory;
use PlugHttp\Factory\PostFactory;
use PlugHttp\Factory\TextPlainFactory;
use PlugHttp\Factory\XmlFactory;
use PlugHttp\Globals\GlobalServer;

class Content
{
	private $server;

	public function __construct(GlobalServer $server)
	{
		$this->server = $server;
	}

	public function getBody()
	{
		$json 		= JsonFactory::create();
		$post 		= PostFactory::create();
		$formData 	= FormDataFactory::create();
		$urlEncode 	= FormUrlEncodedFactory::create();
		$textPlain  = TextPlainFactory::create();
		$xml        = XmlFactory::create();

		$json->next($formData);
		$formData->next($urlEncode);
		$urlEncode->next($textPlain);
		$textPlain->next($xml);
		$xml->next($post);

		return $json->handle($this->server);
	}
}