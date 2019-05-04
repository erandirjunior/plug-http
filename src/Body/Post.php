<?php

namespace PlugHttp\Body;

class Post implements Handler
{
	private $post;

	public function __construct($post)
	{
		$this->post = $post;
	}

	public function getBody()
	{
		return $this->post;
	}

	public function handle($server)
	{
		return $this->getBody();
	}
}