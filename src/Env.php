<?php

namespace PlugHttp;

use PlugHttp\Globals\GlobalEnv;

class Env implements CreatorInterface
{
	public static function create()
	{
		return new GlobalEnv($_ENV);
	}
}