<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Body\Content;
use PlugRoute\Test\Classes\ServerClass;
use PlugRoute\Test\Classes\ServerClassFormData;
use PlugRoute\Test\Classes\ServerClassJson;
use PlugRoute\Test\Classes\ServerClassTextPlain;
use PlugRoute\Test\Classes\ServerClassUrlEncoded;
use PlugRoute\Test\Classes\ServerClassXml;

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

	public function testPlainText()
	{
		$instance = new ServerClassTextPlain([]);
		$content = new Content($instance);
		self::assertEquals('Text of example', $content->getBody());
	}

	public function testApplicationXml()
	{
		$instance = new ServerClassXml([]);
		$instance->flag(1);
		$content = new Content($instance);

		$xml = '<?xml version="1.0" encoding="UTF-8"?>
                <note>
                   <to>Tove</to>
                   <from>Jani</from>
                   <heading>Reminder</heading>
                   <body>Don\'t forget me this weekend!</body>
                </note>';

		$element = new \SimpleXMLElement($xml);

        self::assertEquals($element, $content->getBody());
	}

	public function testTextXml()
	{
        $instance = new ServerClassXml([]);
        $instance->flag(2);
        $content = new Content($instance);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <note>
                   <to>Tove</to>
                   <from>Jani</from>
                   <heading>Reminder</heading>
                   <body>Don\'t forget me this weekend!</body>
                </note>';

        $element = new \SimpleXMLElement($xml);

        self::assertEquals($element, $content->getBody());
	}
}