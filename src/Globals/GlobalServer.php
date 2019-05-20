<?php

namespace PlugHttp\Globals;

class GlobalServer
{
	private $server;

	public function __construct($server)
	{
		$this->server = $server;
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
		return file_get_contents("php://input");
	}
}