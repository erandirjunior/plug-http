<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Globals\Server;

class ServerClassXml extends Server
{
	private $flag;

	public function getContentType()
	{
	    $contentType = $this->flag == 1 ? 'application/xml' : 'text/xml';

		$array = [
			'Content-Type: '.$contentType
		];

		return $this->clearHeadersFromHeadersList($array, 'Content-Type');
	}

	public function getContent()
	{
		return '<?xml version="1.0" encoding="UTF-8"?>
                <note>
                   <to>Tove</to>
                   <from>Jani</from>
                   <heading>Reminder</heading>
                   <body>Don\'t forget me this weekend!</body>
                </note>';
	}

	public function flag($flag)
	{
		$this->flag = $flag;
	}
}