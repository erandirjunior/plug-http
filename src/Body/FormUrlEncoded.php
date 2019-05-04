<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class FormUrlEncoded implements Handler, Advancer//implements Body
{
	private $handler;

	public function getBody($content)
	{
		$values = [];

		if (!empty($content)) {
			if (!strpos($content, '&')) {
				$array = explode('=', $content);
				return [$array[0] => $array[1]];
			}

			$contentArray = explode('&', $content);

			foreach ($contentArray as $value) {
				$aux = explode('=', $value);
				$values[$aux[0]] = $aux[1];
			}
		}
		return $values;
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