<?php

namespace InsalesApi;
class Builder
{
	public static function populate($object, array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists(
				$object,
				$method
			)) {
				$object->$method($value);
			} else if (property_exists(
				$object,
				$key
			)) {
				$object->{$key} = $value;
			} else if (isset($object->unknownProperties) && is_array($object->unknownProperties)) {
				$object->unknownProperties[$key] = $value;
			}
		}
		return $object;
	}
}