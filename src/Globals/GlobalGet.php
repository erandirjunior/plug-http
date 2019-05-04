<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalGet implements GlobalInterface, Adder
{
	private $get;

	public function __construct($get)
	{
		$this->get = $get;
	}

	public function get(string $key): string
	{
		return $this->get[$key];
	}

	public function all(): array
	{
		return $this->get;
	}

	public function except(array $values): array
	{
		return ArrayUtil::except($this->get, $values);
	}

	public function only(array $values): array
	{
		return ArrayUtil::only($this->get, $values);
	}

	public function has(string $value): bool
	{
		return !empty($this->get[$value]);
	}

	public function add($key, $value)
	{
		$this->get[$key] = $value;

		return $this;
	}

	public function remove(string $key)
	{
		unset($this->get[$key]);
	}
}