<?php

namespace PlugHttp;

/**
 * Class Response
 * @package PlugHttp
 */
class Response
{
    /**
     * @var array
     */
    private array $headers;

    /**
     * @var int
     */
    private int $statusCode;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->headers = [];
        $this->statusCode = 200;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function addHeaders(array $headers): Response
	{
		foreach ($headers as $v) {
			$this->headers[] = $v;
		}

		return $this;
	}

    /**
     * @param string $header
     * @param mixed $value
     * @return $this
     */
    public function addHeader(string $header, mixed $value): Response
	{
        $this->headers[$header] = $value;

		return $this;
	}

    /**
     * @return array
     */
    public function getHeaders(): array
	{
		return $this->headers;
	}

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode): Response
	{
		$this->statusCode = $statusCode;

		return $this;
	}

    /**
     * @return int
     */
    public function getStatusCode(): int
	{
		return $this->statusCode;
	}

    /**
     * @return $this
     */
    public function response(): Response
	{
		foreach ($this->headers as $k => $v) {
			header("{$v}");
		}

		header("HTTP/1.0 {$this->statusCode}");

		return $this;
	}

    /**
     * @param array $data
     * @return false|string
     */
    public function json(array $data)
	{
		header("Content-type: application/json");

		return json_encode($data);
	}
}