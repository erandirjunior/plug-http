<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class Json implements Handler, Advancer
{
	private Handler $handler;

	public function getBody($content)
	{
		return json_decode($content, true);
	}

	public function next(Handler $handler)
	{
		$this->handler = $handler;
	}

	public function handle($server)
	{
		if (ContentHelper::contentIs($server, 'json')) {
			return $this->getBody($server->getContent());
		}
		
		return $this->handler->handle($server);
	}
}