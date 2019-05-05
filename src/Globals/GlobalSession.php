<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalSession implements GlobalInterface, Adder
{
	private $session;

	public function __construct($session)
	{
		$this->session = $session;
	}

	public function get(string $key): string
	{
		return $this->session[$key];
	}

	public function all(): array
	{
		return $this->session;
	}

	public function except(array $values): array
	{
		return ArrayUtil::except($this->session, $values);
	}

	public function only(array $values): array
	{
		return ArrayUtil::only($this->session, $values);
	}

	public function has(string $value): bool
	{
		return !empty($this->session[$value]);
	}

	public function add($key, $value)
	{
		$this->session[$key] = $value;
		$this->setGlobal($key, $value);

		return $this;
	}

	public function remove(string $key)
	{
		unset($this->session[$key]);
		$this->removeValueFromGlobal($key);

		return $this;
	}

	public function removeValueFromGlobal($key)
	{
		if (!empty($_SESSION)) {
			unset($_SESSION[$key]);
		}
	}

	private function setGlobal($key, $value)
	{
		$_SESSION[$key] = $value;
	}
}