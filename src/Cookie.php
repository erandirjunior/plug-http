<?php

namespace PlugHttp;

use PlugHttp\Globals\GlobalCookie;

class Cookie implements CreatorInterface
{
	public static function create()
	{
		return new GlobalCookie($_COOKIE);
	}
}