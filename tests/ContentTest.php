<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Body\Content;
use PlugRoute\Test\Classes\ServerClassJson;
use PlugRoute\Test\Classes\ServerClassTextPlain;
use PlugRoute\Test\Classes\ServerClassUrlEncoded;
use PlugRoute\Test\Classes\ServerClassXml;

class ContentTest extends TestCase
{
	public function testJson()
	{
		$instance = new ServerClassJson();
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest'], $content->all());
	}

	public function testUrlEncoded()
	{
		$instance = new ServerClassUrlEncoded();
		$instance->flag(1);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest'], $content->all());
		$instance->flag(2);
		$content = new Content($instance);
		self::assertEquals(['test' => 'myTest', 'lang' => 'PHP', 'dev' => 'Erandir'], $content->all());
	}

    public function testPlainText()
    {
        $instance = new ServerClassTextPlain();
        $content = new Content($instance);
        self::assertEquals(['Text of example'], $content->all());
    }

    public function testApplicationXml()
    {
        $instance = new ServerClassXml();
        $instance->flag(1);
        $content = new Content($instance);

        $expected = [
            "to" => "Tove",
            "from" => "Jani",
            "heading" => "Reminder",
            "body" => "Don't forget me this weekend!",
        ];

        self::assertEquals($expected, $content->all());
    }

    public function testTextXml()
    {
        $instance = new ServerClassXml();
        $instance->flag(2);
        $content = new Content($instance);

        $expected = [
            "to" => "Tove",
            "from" => "Jani",
            "heading" => "Reminder",
            "body" => "Don't forget me this weekend!",
        ];

        self::assertEquals($expected, $content->all());
    }
}