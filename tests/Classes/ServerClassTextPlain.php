<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\GlobalServer;

class ServerClassTextPlain extends GlobalServer
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