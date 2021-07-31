<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Response;

class ResponseTest extends TestCase
{
	private Response $instance;

	public function setUp()
	{
		$this->instance = new Response();
	}

	public function testStatusCode()
	{
		self::assertEquals(200, $this->instance->getStatusCode());
		$this->instance->setStatusCode(500);
		self::assertEquals(500, $this->instance->getStatusCode());
	}

	public function testHeaders()
	{
		$headers = [
			'Cache-Control: no-cache',
			'Pragma: no-cache',
		];

		$this->instance->addHeaders($headers);

		self::assertEquals($headers, $this->instance->getHeaders());
	}

	/**
	 * @testQueryExcept
	 * @runInSeparateProcess
	 **/
	public function testResponseJson()
	{
		$headers = [
			'Cache-Control: no-cache',
			'Pragma: no-cache',
		];

		$response = $this->instance
		->addHeaders($headers)
		->response()
		->json(['test' => 'myTest']);

		self::assertEquals('{"test":"myTest"}', $response);
	}
}