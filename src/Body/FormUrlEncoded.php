<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class FormUrlEncoded implements Handler, Advancer
{
	private Handler $handler;

	public function getBody($content)
	{
	    if (is_array($content)) {
	        return $content;
        }

	    $body = explode('&', $content);
	    $data = [];

	    foreach ($body as $parameter) {
	        $parameterParsed = explode('=', $parameter);
	        $data[$parameterParsed[0]] = $parameterParsed[1];
        }

	    return $data;
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