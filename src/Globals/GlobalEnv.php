<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalEnv implements GlobalInterface, Adder
{
	private $env;

	public function __construct($env)
	{
		$this->env = $env;
	}

	public function get(string $key): string
	{
		return $this->env[$key];
	}

	public function all(): array
	{
		return $this->env;
	}

	public function except(array $values): array
	{
		return ArrayUtil::except($this->env, $values);
	}

	public function only(array $values): array
	{
		return ArrayUtil::only($this->env, $values);
	}

	public function has(string $value): bool
	{
		return !empty($this->env[$value]);
	}

	public function add($key, $value)
	{
		$this->env[$key] = $value;
		$this->setGlobal($key, $value);

		return $this;
	}

	public function remove(string $key)
	{
		unset($this->env[$key]);
		$this->removeValueFromGlobal($key);

		return $this;
	}

	public function removeValueFromGlobal($key)
	{
		unset($_ENV[$key]);
	}

	private function setGlobal($key, $value)
	{
		$_ENV[$key] = $value;
	}
}