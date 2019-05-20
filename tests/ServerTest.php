<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Globals\GlobalServer;
use PlugRoute\Test\Classes\ServerClass;

class ServerTest extends TestCase
{
	private $instance;

	private $aux;

	public function setUp()
	{
		$this->aux = [
			'CONTENT_TYPE' => 'json',
			'REQUEST_METHOD' => 'POST',
			'REQUEST_URI' => '/test',
			'REDIRECT_BASE' => '/new-test'
		];
		$this->instance = new GlobalServer($this->aux);
	}

	public function testMethod()
	{
		self::assertEquals('POST', $this->instance->method());
	}

	public function testContentType()
	{
		$server = new ServerClass([]);
		self::assertEquals('json', $this->instance->getContentType());
		self::assertEquals('json', $server->getContentType());
	}

	public function testIsMethod()
	{
		self::assertEquals(true, $this->instance->isMethod('POST'));
	}

	public function testHeaders()
	{
		self::assertEquals($this->aux, $this->instance->headers());
	}

	public function testGetUrl()
	{
		self::assertEquals($this->aux['REQUEST_URI'], $this->instance->getUrl());
	}

	public function testContent()
	{
		self::assertEquals("", $this->instance->getContent());
	}

	public function testGetHeader()
	{
		self::assertEquals('json', $this->instance->header('CONTENT_TYPE'));
	}
}