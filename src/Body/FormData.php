<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class FormData implements Handler, Advancer//implements Body
{
	private $handler;

	public function getBody($content)
	{
		preg_match_all('/"(.+)"+\s+(.+(?:-{5,})?)/', $content, $matches);

		$array = [];

		foreach ($matches[1] as $key => $match) {
			$matchKey = $this->removeCaractersOfString($match, ['\'', "\""]);

			$array[$matchKey] = $this->getValueFormData($matches[2][$key]);
		}

		return $array;
	}

	public function getValueFormData($value)
	{
		$valueCleared   = $this->removeCaractersOfString($value, ['\'', "\""]);
		$onlyHasTraces  = preg_split("/-{20,}/", $valueCleared, PREG_SPLIT_OFFSET_CAPTURE);
		return count($onlyHasTraces) > 1 ? '' : $valueCleared;
	}

	public function removeCaractersOfString($str, array $caracters)
	{
		return str_replace($caracters, '', $str);
	}

	public function next(Handler $handler)
	{
		$this->handler = $handler;
	}

	public function handle($server)
	{
		if (ContentHelper::contentIs($server, 'form-data')) {
			return $this->getBody($server->getContent());
		}

		return $this->handler->handle($server);
	}
}