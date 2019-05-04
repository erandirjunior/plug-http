<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class FormUrlEncoded implements Handler, Advancer//implements Body
{
	private $handler;

	public function getBody($content)
	{
		if (!strpos($content, '&')) {
			$array = explode('=', $content);
			return [$array[0] => $array[1]];
		}

		$array = explode('&', $content);

		foreach ($array as $value) {
			$aux = explode('=', $value);
			$arrayFormated[$aux[0]] = $aux[1];
		}
		return $arrayFormated;
	}

	public function next(Handler $handler)
	{
		$this->handler = $handler;
	}

	public function handle($server)
	{
		if (ContentHelper::contentIs($server, 'x-www-form-urlencoded')) {
			return $this->getBody($server->getContent());
		}

		return $this->handler->handle($server);
	}
}