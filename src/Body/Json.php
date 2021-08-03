<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class Json implements Handler, Advancer
{
	private Handler $handler;

    private const CONTENT_TYPE = 'json';

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
		if (ContentHelper::contentIs($server, self::CONTENT_TYPE)) {
			return $this->getBody($server->getContent());
		}
		
		return $this->handler->handle($server);
	}
}