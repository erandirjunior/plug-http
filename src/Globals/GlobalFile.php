<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalFile implements GlobalInterface
{
	private $file;

	public function __construct(array $files)
	{
		$this->file = $files;
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

	public function remove(string $key)
	{
		unset($this->file[$key]);
		$this->removeValueFromGlobal($key);

		return $this;
	}

	public function removeValueFromGlobal($key)
	{
		unset($_FILES[$key]);
	}
}