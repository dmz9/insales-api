<?php

namespace InsalesApi\Api;

use InsalesApi\Builder;

abstract class AbstractResponse
{
	protected $originData = null;
	protected $unknownProperties = array();
	protected $request = null;
	protected $headers = array();
	
	public function __construct(array $decodedResponse, $originResponse, $headers, $request = null)
	{
		
		$this->originData = $originResponse;
		$this->headers    = $headers;
		$this->request    = $request;
		
		Builder::populate(
			$this,
			$decodedResponse
		);
	}
	
	public static function fqcn()
	{
		return get_called_class();
	}
	
	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}
	
	/**
	 * @return null
	 */
	public function getRequest()
	{
		return $this->request;
	}
	
	/**
	 * @return mixed
	 */
	public function getOriginData()
	{
		return $this->originData;
	}
	
	/**
	 * @return array
	 */
	public function getUnknownProperties()
	{
		return $this->unknownProperties;
	}
}