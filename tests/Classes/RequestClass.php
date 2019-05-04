<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Request;

class RequestClass extends Request
{
	public function __construct()
	{
		global $_SESSION;
		$_SESSION['teste'] = 1;
	}
}