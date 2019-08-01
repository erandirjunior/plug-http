<?php

namespace PlugHttp\Utils;

class ArrayUtil
{
	public static function only(array $data, array $accept)
	{
		return self::check($data, $accept, true);
	}

	public static function except(array $data, array $except)
	{
		return self::check($data, $except, false);
	}

	private static function check($data, $keys, $in)
	{
		$array = [];

		foreach ($data as $k => $v) {
			if (in_array($k, $keys) === $in) {
				$array[$k] = $v;
			}
		}

		return $array;
	}

    public static function converToObject(array $data)
    {
        $object = new \stdClass();

        foreach ($data as $key => $value) {
            $object->$key = $value;
        }

        return $object;
	}
}