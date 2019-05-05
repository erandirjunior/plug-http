<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Request;

class RequestTest extends TestCase
{
	public function testRequest()
	{
		$requestClass = new Request();
		$request = $requestClass->create();

		$isTrue = $request instanceof \PlugHttp\Globals\GlobalRequest;
		self::assertEquals(true, $isTrue);
	}
}