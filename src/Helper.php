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

			if($element->count()){
				$node=self::XML2Array($element);
			}else if(""!=$element){
				$node=trim($element);
			}else{
				$node=($element['type']=='array')?array():null;
			}
		}

		return $array;
	}

	public static function array2XML(\SimpleXMLElement $root, array $data)
	{
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$new_object = $root->addChild($key);
				self::array2XML(
					$new_object,
					$value
				);
			} else {
				$root->addChild(
					$key,
					$value
				);
			}
		}
	}

	public static function isAssociativeArray($array)
	{
		if (!is_array($array)) {
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

	public static function pre($var)
	{
		echo "<pre>" . print_r(
				$var,
				1
			) . "</pre>";
		echo "\n\r";
	}
}
