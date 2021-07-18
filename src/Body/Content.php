<?php

namespace PlugHttp\Body;

use PlugHttp\Globals\Post;
use PlugHttp\Globals\Server;
use PlugHttp\Utils\ArrayUtil;

class Content
{
	private Server $server;

    /**
     * @var string|array
     */
	private $body;

	public function __construct(Server $server)
	{
		$this->server = $server;
		$this->getBodyRequest();
		$this->createProperty();
	}

	private function getBodyRequest()
	{
        $xml = new XML();
        $json = new Json();
        $post = new Post();
        $formData = new FormData();
        $urlEncode = new FormUrlEncoded();
        $textPlain = new TextPlain();

		$json->next($formData);
		$formData->next($urlEncode);
		$urlEncode->next($textPlain);
		$textPlain->next($xml);
		$xml->next($post);

		$this->body = $json->handle($this->server);
	}

	private function createProperty()
	{
	    if (is_array($this->body)) {
            foreach ($this->body as $key => $value) {
                $this->__set($key, $value);
            }
        }
	}

    public function add(string $key, $value): void
    {
        $this->body[$key] = $value;

        $this->__set($key, $value);
    }

    public function remove(string $key): void
    {
        unset($this->body[$key]);

        unset($this->$key);
    }

    public function get(string $key)
    {
        return $this->body[$key];
    }

    /**
     * @return array|string
     */
    public function all()
    {
        return $this->body;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        $this->$name;
    }

    public function except(array $keys): array
    {
        return ArrayUtil::except($this->body, $keys);
    }

    public function only(array $keys): array
    {
        return ArrayUtil::only($this->body, $keys);
    }

    public function has(string $key): bool
    {
        return !empty($this->body[$key]);
    }
}