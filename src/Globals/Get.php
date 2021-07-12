<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class Get implements GlobalInterface
{
	private array $get;

	public function __construct()
	{
		$this->get = $_GET;
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

	public function add($key, $value): void
	{
		$this->get[$key] = $value;

		$this->set($key, $value);
	}

	public function remove(string $key): void
	{
		unset($this->get[$key]);
	}

    private function set(string $key, $value)
    {
        $_GET[$key] = $value;
    }
}