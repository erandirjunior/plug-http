<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Body\Content;
use PlugRoute\Test\Classes\ServerClass;
use PlugRoute\Test\Classes\ServerClassFormData;
use PlugRoute\Test\Classes\ServerClassJson;
use PlugRoute\Test\Classes\ServerClassUrlEncoded;

class ContentTest extends TestCase
{

	public function testJson()
	{
		$instance = new ServerClassJson([]);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest'], $content->getBody());
	}

	public function testFormData()
	{
		$instance = new ServerClassFormData(['REQUEST_METHOD' => 'PUT']);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest'], $content->getBody());
	}

	public function testPost()
	{
		$instance = new ServerClass([]);
		$content = new Content($instance);
		self::assertEquals(null, $content->getBody());
	}

	public function testUrlEncoded()
	{
		$instance = new ServerClassUrlEncoded([]);
		$instance->flag(1);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest'], $content->getBody());
		$instance->flag(2);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest', 'lang' => 'PHP', 'dev' => 'Erandir'], $content->getBody());
	}
}