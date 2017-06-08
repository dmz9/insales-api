<?php

namespace InsalesApi\Api;

use InsalesApi\Exception\SDKException;

class AbstractCollection
{
	protected $collection = array();
	protected $originData = null;
	protected $request = null;
	protected $headers = array();
	protected $itemClass = '';

	public function __construct()
	{
		if (empty($this->itemClass)) {
			throw new SDKException("Collection must have item classname");
		}
	}

	public function getItemClass()
	{
		return $this->itemClass;
	}

	/**
	 * @return array
	 */
	public function getCollection()
	{
		return $this->collection;
	}

	public function add(AbstractResponse $instance)
	{
		if (!($instance instanceof $this->itemClass)) {
			throw new SDKException(
				"Instance class mismatch, given " . get_class($instance) . ", expected {$this->itemClass}"
			);
		}
		$this->collection[] = $instance;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * @param null $request
	 * @return AbstractCollection
	 */
	public function setRequest($request)
	{
		$this->request = $request;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * @param array $headers
	 * @return AbstractCollection
	 */
	public function setHeaders($headers)
	{
		$this->headers = $headers;
		return $this;
	}

	/**
	 * @return null
	 */
	public function getOriginData()
	{
		return $this->originData;
	}

	/**
	 * @param null $originData
	 * @return AbstractCollection
	 */
	public function setOriginData($originData)
	{
		$this->originData = $originData;
		return $this;
	}

	public function all()
	{
		return $this->getCollection();
	}
}