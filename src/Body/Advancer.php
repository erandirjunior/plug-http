<?php

namespace PlugHttp\Body;

interface Advancer
{
	public function next(Handler $handler);
}