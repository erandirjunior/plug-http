<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class Env implements GlobalInterface
{
	private array $env;

	public function __construct()
	{
		$this->env = $_ENV;
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

	public function add(string $key, $value): void
	{
		$this->env[$key] = $value;

		$this->set($key, $value);
	}

	public function remove(string $key): void
	{
		unset($this->env[$key]);

		unset($_ENV[$key]);
	}

    private function set(string $key, $value)
    {
        $_ENV[$key] = $value;
    }
}