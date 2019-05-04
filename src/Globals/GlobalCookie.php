<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalCookie implements GlobalInterface, Adder
{
	private $cookie;

	public function __construct($cookies)
	{
		$this->cookie = $cookies;
	}

	public function get(string $key): string
	{
		return $this->cookie[$key];
	}

	public function all(): array
	{
		return $this->cookie;
	}

	public function except(array $values): array
	{
		return ArrayUtil::except($this->cookie, $values);
	}

	public function only(array $values): array
	{
		return ArrayUtil::only($this->cookie, $values);
	}

	public function has(string $value): bool
	{
		return !empty($this->cookie[$value]);
	}

	public function add($key, $value)
	{
		$this->cookie[$key] = $value;

		return $this;
	}

	public function remove(string $key)
	{
		unset($this->cookie[$key]);

		return $this;
	}
}