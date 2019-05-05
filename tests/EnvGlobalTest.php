<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Globals\GlobalEnv;

class EnvGlobalTest extends TestCase
{
	private $instance;

	public function setUp()
	{
		$array = [
			'name' => 'Erandir Junior',
			'age' => 23,
			'email' => 'aefs12junior@gmail.com'
		];
		$this->instance = new GlobalEnv($array);
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

	public function testAdd()
	{
		$this->instance->add('key', 'value');
		$expected = [
			'name' => 'Erandir Junior',
			'age' => 23,
			'email' => 'aefs12junior@gmail.com',
			'key' => 'value'
		];
		self::assertEquals($expected, $this->instance->all());
	}

	public function testRemove()
	{
		$this->instance->remove('email');
		$expected = [
			'name' => 'Erandir Junior',
			'age' => 23,
		];
		self::assertEquals($expected, $this->instance->all());
	}
}