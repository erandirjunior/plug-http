<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\Server;

class ServerClassTextPlain extends Server
{
	public function getContentType()
	{
		$array = [
			'Content-Type: text/plain'
		];

		return $this->clearHeadersFromHeadersList($array, 'Content-Type');
	}

	public function getContent()
	{
		return 'Text of example';
	}
}