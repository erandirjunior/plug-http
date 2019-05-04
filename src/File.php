<?php

namespace PlugHttp;

use PlugHttp\Globals\GlobalFile;

class File implements CreatorInterface
{
	public static function create()
	{
		return new GlobalFile($_FILES);
	}
}