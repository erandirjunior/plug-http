<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class Server implements GlobalInterface
{
	private array $server;

	public function __construct()
	{
		$this->server = $_SERVER;
	}

	private function getHeadersFromHeadersList()
	{
		return headers_list();
	}

	protected function clearHeadersFromHeadersList($headers, $needle)
	{
		foreach ($headers as $header) {
			if(stripos($header,$needle) !== false) {
				$headerParts = explode(':',$header);
				return trim($headerParts[1]);
			}
		}
	}

	private function getContentTypeFromHeadersList($needle)
	{
		$contentType = $this->getHeadersFromHeadersList();
		return $this->clearHeadersFromHeadersList($contentType, $needle);
	}

	public function getContentType()
	{
		$contentType = $this->getContentTypeFromHeadersList('Content-Type');
		return $this->server['CONTENT_TYPE'] ?? $contentType;
	}

	public function isMethod(string $method)
	{
		return $this->method() === $method;
	}

	public function method()
	{
		return parse_url($this->server['REQUEST_METHOD'], PHP_URL_PATH);
	}

	public function headers()
	{
		return $this->server;
	}

	public function header(string $header)
	{
		return $this->server[$header];
	}

	public function getUrl()
	{
		$url = parse_url($this->server['REQUEST_URI'], PHP_URL_PATH);

		if (!empty($this->server['REDIRECT_BASE'])) {
			$url = str_replace($this->server['REDIRECT_BASE'], '', $url);
		}

		return $url;
	}

	public function getContent()
	{
        if (!empty($_POST)) {
            return $_POST;
        }

		return file_get_contents("php://input");
	}

    public function get(string $key): string
    {
        return $this->server[$key];
    }

    public function all(): array
    {
        return $this->server;
    }

    public function except(array $values): array
    {
        return ArrayUtil::except($this->server, $values);
    }

    public function only(array $values): array
    {
        return ArrayUtil::only($this->server, $values);
    }

    public function has(string $value): bool
    {
        return !empty($this->server[$value]);
    }

    public function add($key, $value): void
    {
        $this->server[$key] = $value;

        $this->set($key, $value);
    }

    public function remove(string $key): void
    {
        unset($this->server[$key]);

        unset($_SERVER[$key]);
    }

    private function set(string $key, $value)
    {
        $_SERVER[$key] = $value;
    }
}