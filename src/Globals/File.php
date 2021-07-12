<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class File implements GlobalInterface
{
	private array $file;

	public function __construct()
	{
		$this->file = $_FILES;
	}

	public function get(string $key): string
	{
		return $this->file[$key];
	}

	public function all(): array
	{
		return $this->file;
	}

	public function except(array $values): array
	{
		return ArrayUtil::except($this->file, $values);
	}

	public function only(array $values): array
	{
		return ArrayUtil::only($this->file, $values);
	}

	public function has(string $value): bool
	{
		return !empty($this->file[$value]);
	}

	public function remove(string $key): void
	{
		unset($this->file[$key]);
	}
}