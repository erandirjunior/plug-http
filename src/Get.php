<?php

namespace PlugHttp;

use PlugHttp\Globals\GlobalGet;

class Get implements CreatorInterface
{
	public static function create()
	{
		return new GlobalGet($_GET);
	}
}