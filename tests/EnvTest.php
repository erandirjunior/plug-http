<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Env;

class EnvTest extends TestCase
{
	public function testEnv()
	{
		$envClass = new Env();
		$env = $envClass->create();

		$isTrue = $env instanceof \PlugHttp\Globals\GlobalEnv;
		self::assertEquals(true, $isTrue);
	}
}