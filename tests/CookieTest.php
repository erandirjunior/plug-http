<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Cookie;

class CookieTest extends TestCase
{
	public function testRequest()
	{
		$requestClass = new Cookie();
		$request = $requestClass->create();
		$isTrue = $request instanceof \PlugHttp\Globals\GlobalCookie;
		self::assertEquals(true, $isTrue);
	}
}