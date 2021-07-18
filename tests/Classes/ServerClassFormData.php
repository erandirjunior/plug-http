<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\Server;

class ServerClassFormData extends Server
{
	public function getContentType()
	{
		$array = [
			'Content-Type: form-data'
		];
		return $this->clearHeadersFromHeadersList($array, 'Content-Type');
	}

	public function getContent() {
		return '----------------------------418516965270589940282156
Content-Disposition: form-data; name="test"

myTest
----------------------------418516965270589940282156--';
	}
}