<?php

namespace InsalesApi\Api;
abstract class AbstractResponse
{
	protected $originData = null;
	protected $unknownProperties = array();
	protected $request = null;
	protected $headers = array();

	public function __construct($decoded)
	{
		$static = get_called_class();
		foreach ($decoded as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (method_exists(
				$static,
				$method
			)) {
				$this->$method($value);
			} else if (property_exists(
				$static,
				$key
			)) {
				$this->{$key} = $value;
			} else {
				$this->unknownProperties[$key] = $value;
			}
		}
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
	 * @return AbstractResponse
	 */
	public function setHeaders($headers)
	{
		$this->headers = $headers;
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
	 * @return AbstractResponse
	 */
	public function setRequest($request)
	{
		$this->request = $request;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOriginData()
	{
		return $this->originData;
	}

	/**
	 * @param mixed $originData
	 * @return AbstractResponse
	 */
	public function setOriginData($originData)
	{
		$this->originData = $originData;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getUnknownProperties()
	{
		return $this->unknownProperties;
	}
}