<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class FormUrlEncoded implements Handler, Advancer
{
	private $handler;

	public function getBody($content)
	{
        return $content;
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