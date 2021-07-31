<?php

namespace PlugHttp\Utils;

use PlugHttp\Globals\Server;

class ContentHelper
{
	public static function contentIs(Server $server, $type): bool
	{
		return strpos($server->getContentType(), $type) !== false;
	}
}