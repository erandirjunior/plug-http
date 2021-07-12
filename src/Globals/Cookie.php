<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class Cookie implements GlobalInterface
{
	private array $cookie;

	public function __construct()
	{
		$this->cookie = $_COOKIE;
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

	public function add(string $key, $value, $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false): void
	{
		$this->cookie[$key] = $value;

		$this->set($key, $value, $expire, $path, $domain, $secure, $httponly);
	}

	public function remove(string $key): void
	{
		unset($this->cookie[$key]);

        unset($_COOKIE[$key]);
	}

	private function set(string $key, $value, $expire, $path, $domain, $secure, $httponly)
	{
		setcookie($key, $value, $expire, $path, $domain, $secure, $httponly);
	}
}