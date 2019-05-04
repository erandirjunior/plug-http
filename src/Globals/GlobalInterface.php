<?php

namespace PlugHttp\Globals;

interface GlobalInterface
{
	public function get(string $key): string;

	public function all(): array;

	public function except(array $values): array;

	public function only(array $values): array;

	public function has(string $value): bool;

	public function remove(string $key);
}