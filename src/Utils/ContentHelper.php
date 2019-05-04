<?php

namespace PlugHttp\Utils;

use PlugHttp\Globals\GlobalServer;

class ContentHelper
{
	public static function contentIs(GlobalServer $server, $type)
	{
		return strpos($server->getContentType(), $type) !== false;
	}
}