<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Globals\GlobalSession;

class SessionGlobalTest extends TestCase
{
	private $instance;

	public function setUp()
	{
		$array = [
			'name' => 'Erandir Junior',
			'age' => 23,
			'email' => 'aefs12junior@gmail.com'
		];
		$this->instance = new GlobalSession($array);
	}

	public function testAll()
	{
		$expected = ['name' => 'Erandir Junior', 'age' => 23, 'email' => 'aefs12junior@gmail.com'];
		self::assertEquals($expected, $this->instance->all());
	}

	public function testGet()
	{
		$expected = 'Erandir Junior';
		self::assertEquals($expected, $this->instance->get('name'));
	}

	public function testOnly()
	{
		$expected = ['name' => 'Erandir Junior', 'age' => 23];
		self::assertEquals($expected, $this->instance->only(['name', 'age']));
	}

	public function testExcept()
	{
		$expected = ['email' => 'aefs12junior@gmail.com'];
		self::assertEquals($expected, $this->instance->except(['name', 'age']));
	}

	public function testHas()
	{
		self::assertEquals(true, $this->instance->has('age'));
	}

	public function testRemove()
	{
		$_SESSION['key'] = 'value';
		$expected = [
			'name' => 'Erandir Junior',
			'email' => 'aefs12junior@gmail.com'
		];
		self::assertEquals($expected, $this->instance->remove('age')->all());
	}

	public function testAdd()
	{
		$expected = [
			'name' => 'Erandir Junior',
			'age' => 23,
			'email' => 'aefs12junior@gmail.com',
			'sex'	=> 'm'
		];
		self::assertEquals($expected, $this->instance->add('sex', 'm')->all());
	}
}