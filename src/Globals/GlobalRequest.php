<?php

namespace PlugHttp\Globals;

use PlugHttp\Utils\ArrayUtil;

class GlobalRequest
{
	private $get;

	private $body;

	private $file;

	private $server;

	public function __construct(
		$body,
		GlobalGet $get,
		GlobalFile $file,
		GlobalServer $server
	)
	{
		$this->get 		= $get;
		$this->server	= $server;
		$this->body 	= $body;
		$this->file 	= $file;
	}

	public function all()
	{
		return $this->body;
	}

	public function bodyObject()
	{
		if (is_array($this->body)) {
            return ArrayUtil::converToObject($this->body);
        }

		if (is_object($this->body)) {
		    return $this->body;
        }

		throw new \Exception("It wasn't possible convert to object");
	}
	
	public function input(string $value)
	{
		return $this->body[$value];
	}

	public function query()
	{
		return $this->get->all();
	}

	public function queryWith(string $parameter)
	{
		return $this->get->get($parameter);
	}

	public function queryOnly(array $values)
	{
		return $this->get->only($values);
	}

	public function queryExcept(array $values)
	{
		return $this->get->except($values);
	}

	public function redirect(string $path, int $code = 301)
	{
		header("HTTP/1.0 {$code}");
		header("Location: {$path}");

		return true;
	}

	public function except(array $values)
	{
		return ArrayUtil::except($this->body, $values);
	}

	public function only(array $values)
	{
		return ArrayUtil::only($this->body, $values);
	}

	public function has(string $value)
	{
		return isset($this->body[$value]) ? true : false;
	}

	public function method()
	{
		return $this->server->method();
	}

	public function getUrl()
	{
		return $this->server->getUrl();
	}

	public function isMethod(string $method)
	{
		return $this->method() === strtoupper($method);
	}

	public function remove(string $key)
	{
		unset($this->body[$key]);

		return $this;
	}

	public function removeQuery(string $key)
	{
		$this->get->remove($key);

		return $this;
	}

	public function add($key, $value)
	{
		$this->body[$key] = $value;

		return $this;
	}

	public function addQuery($key, $value)
	{
		$this->get->add($key, $value);

		return $this;
	}

	public function files()
	{
		return $this->file->all();
	}

	public function headers()
	{
		return $this->server->headers();
	}

	public function header(string $header)
	{
		return $this->server->header($header);
	}
}