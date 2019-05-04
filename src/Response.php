<?php

namespace PlugHttp;

class Response
{
	private $headers = [];

	private $statusCode = 200;

	public function setHeaders(array $header)
	{
		foreach ($header as $v) {
			$this->headers[] = $v;
		}

		return $this;
	}

	public function getHeaders(): array
	{
		return $this->headers;
	}

	public function setStatusCode(int $statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	public function response()
	{
		foreach ($this->headers as $k => $v) {
			header("{$v}");
		}

		header("HTTP/1.0 {$this->statusCode}");

		return $this;
	}

	public function json(array $data)
	{
		header("Content-type: application/json");

		return json_encode($data);
	}
}