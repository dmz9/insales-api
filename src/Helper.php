<?php

namespace InsalesApi;

class Helper
{
	public static function XML2Array(\SimpleXMLElement $parent)
	{
		$array = array();
		/**
		 * @var $element \SimpleXMLElement
		 */
		foreach ($parent as $name => $element) {
			($node = &$array[$name]) && (1 === count($node)
				? $node = array($node)
				: 1) && $node = &$node[];

			$node = $element->count()
				? self::XML2Array($element)
				: trim($element);
		}

		return $array;
	}

	public static function isAssociativeArray($array)
	{
		if(!is_array($array)){
			return false;
		}
		if (array() === $array) {
			return false;
		}
		return array_keys($array) !== range(
				0,
				count($array) - 1
			);
	}
}
