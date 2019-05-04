<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugRoute\Test\Classes\SessionClass;

class SessionTest extends TestCase
{
	public function testRequest()
	{
		$requestClass = new SessionClass();
		$request = $requestClass->create();
		$isTrue = $request instanceof \PlugHttp\Globals\GlobalSession;
		self::assertEquals(true, $isTrue);
	}
}