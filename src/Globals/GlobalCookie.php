<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalCookie implements GlobalInterface
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

	public function add(string $key, $value, $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false)
	{
		$this->cookie[$key] = $value;

		$this->setCookie($key, $value, $expire, $path, $domain, $secure, $httponly);

		return $this;
	}

	public function remove(string $key)
	{
		unset($this->cookie[$key]);
		$this->removeValueFromGlobal($key);

		return $this;
	}

	public function removeValueFromGlobal($key)
	{
		unset($_COOKIE[$key]);
	}

	private function setCookie(string $key, $value, $expire, $path, $domain, $secure, $httponly)
	{
		setcookie($key, $value, $expire, $path, $domain, $secure, $httponly);
	}
}