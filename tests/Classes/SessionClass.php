<?php

namespace PlugRoute\Test\Classes;

use PlugHttp\Session;

class SessionClass extends Session
{
	public function __construct()
	{
		global $_SESSION;
	}
}