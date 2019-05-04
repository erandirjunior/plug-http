<?php

namespace PlugHttp;

use PlugHttp\Globals\GlobalSession;

class Session implements CreatorInterface
{
	public static function create()
	{
		return new GlobalSession($_SESSION);
	}
}