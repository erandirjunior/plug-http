<?php

namespace PlugHttp\Body;

use PlugHttp\Globals\GlobalServer;

class Content
{
	private $server;

	public function __construct(GlobalServer $server)
	{
		$this->server = $server;
	}

	public function getBody()
	{
		$json 		= $this->createJson();
		$post 		= $this->createPost();
		$formData 	= $this->createFormData();
		$urlEncode 	= $this->createFormUrlEncoded();

		$json->next($formData);
		$formData->next($urlEncode);
		$urlEncode->next($post);

		return $json->handle($this->server);
	}

	private function createFormData()
	{
		return new FormData();
	}

	private function createFormUrlEncoded()
	{
		return new FormUrlEncoded();
	}

	private function createPost()
	{
		return new Post($_POST);
	}

	private function createJson()
	{
		return new Json();
	}
}