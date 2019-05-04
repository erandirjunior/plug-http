<?php

namespace PlugHttp\Body;

interface Handler
{
	public function handle($server);
}