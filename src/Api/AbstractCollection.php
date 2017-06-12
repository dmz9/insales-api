<?php

namespace InsalesApi\Api;

use InsalesApi\Exception\SDKException;
use InsalesApi\Helper;

class AbstractCollection
{
	protected $collection = array();
	protected $originResponse = null;
	protected $request = null;
	protected $headers = array();
	/**
	 * @var callable
	 */
	protected $itemClass;
	
	public function __construct(array $decodedResponse, $originResponse, $headers, $request = null)
	{
		
		if (empty($this->itemClass)) {
			throw new SDKException("Collection must have item classname");
		} else if (!class_exists($this->itemClass)) {
			throw new SDKException("Class {$this->itemClass} not found");
		} else if (!is_subclass_of(
			$this->itemClass,
			AbstractResponse::fqcn()
		)) {
			throw new SDKException("Class {$this->itemClass} must extend AbstractResponse");
		} else if (Helper::isAssociativeArray($decodedResponse)) {
			throw new SDKException("Data is associative array, numeric array expected");
		}
		
		$this->originResponse = $originResponse;
		$this->headers        = $headers;
		$this->request        = $request;
		
		foreach ($decodedResponse as $itemData) {
			$this->collection[] = new $this->itemClass($itemData);
		}
	}
	
	/**
	 * @return array
	 */
	public function all()
	{
		return $this->collection;
	}
	
	/**
	 * @return bool
	 */
	public function isEmpty()
	{
		return empty($this->collection);
	}
}