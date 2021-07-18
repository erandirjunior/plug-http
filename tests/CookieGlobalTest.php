<?php

namespace PlugRoute\Test;

use PHPUnit\Framework\TestCase;
use PlugHttp\Globals\Cookie;

class CookieGlobalTest extends TestCase
{
	private Cookie $instance;

	private array $data;

	public function setUp()
	{
		$this->data = [
			'name' => 'Erandir Junior',
			'age' => 23,
			'email' => 'aefs12junior@gmail.com'
		];
		$this->instance = new Cookie();
		foreach ($this->data as $key => $value) {
            $this->instance->add($key, $value);
        }
	}

    /**
     * @runInSeparateProcess
     */
	public function testGet()
	{
	    $expected = 'Erandir Junior';

		self::assertEquals($expected, $this->instance->get('name'));
	}

    /**
     * @runInSeparateProcess
     */
    public function testAll()
    {
      self::assertEquals($this->data, $this->instance->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function testExcept()
    {
        $expected = ['email' => 'aefs12junior@gmail.com'];
        self::assertEquals($expected, $this->instance->except(['name', 'age']));
    }

    /**
     * @runInSeparateProcess
     */
	public function testOnly()
	{
		$expected = ['name' => 'Erandir Junior', 'age' => 23];
		self::assertEquals($expected, $this->instance->only(['name', 'age']));
	}

    /**
     * @runInSeparateProcess
     */
	public function testHas()
	{
		self::assertEquals(true, $this->instance->has('age'));
	}

    /**
     * @runInSeparateProcess
     */
	public function testRemove()
	{
		$expected = [
			'name' => 'Erandir Junior',
			'email' => 'aefs12junior@gmail.com'
		];
		self::assertEquals($expected, $this->instance->remove('age')->all());
	}
}