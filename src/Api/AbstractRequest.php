<?php

namespace InsalesApi\Api;

use InsalesApi\Builder;

abstract class AbstractRequest
{
	protected $_container = array();
	
	/**
	 * @param array $data
	 *
	 * @return static
	 */
	public static function fromArray(array $data)
	{
		
		if (isset($data['_container'])) {
			unset($data['_container']);
		}
		
		return Builder::populate(
			new static(),
			$data
		);
	}
	
	public function asArray()
	{
		return $this->_container;
	}
}