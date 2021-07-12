<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class Session implements GlobalInterface
{
	private array $session;

	public function __construct()
	{
		$this->session = $_SESSION;
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

	public function add($key, $value): void
	{
		$this->session[$key] = $value;

		$this->set($key, $value);
	}

	public function remove(string $key): void
	{
		unset($this->session[$key]);

        unset($_SESSION[$key]);
	}

    private function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
}