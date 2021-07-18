<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\Server;

class ServerClass extends Server
{
	public function getContentType()
	{
		$array = [
			'Content-Type: json'
		];
		return $this->clearHeadersFromHeadersList($array, 'Content-Type');
	}
}