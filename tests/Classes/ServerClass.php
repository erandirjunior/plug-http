<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\GlobalServer;

class ServerClass extends GlobalServer
{
	public function getContentType()
	{
		$array = [
			'Content-Type: json'
		];
		return $this->clearHeadersFromHeadersList($array, 'Content-Type');
	}
}