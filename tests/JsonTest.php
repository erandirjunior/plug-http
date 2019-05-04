<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Body\Json;

class JsonTest extends TestCase
{
	public function testBody()
	{
		$json = '{"test":"myTest"}';
		$obj = new Json();
		self::assertEquals(["test" => "myTest"], $obj->getBody($json));
	}
}