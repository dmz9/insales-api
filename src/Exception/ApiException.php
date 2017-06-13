<?php

namespace InsalesApi\Exception;
class ApiException extends \Exception
{
	private $_debug = array();
	
	/**
	 * @param mixed $responseHeaders
	 *
	 * @return $this
	 */
	public function setResponseHeaders($responseHeaders)
	{
		$this->_debug['responseHeaders'] = $responseHeaders;
		return $this;
	}
	
	/**
	 * @param mixed $path
	 *
	 * @return $this
	 */
	public function setPath($path)
	{
		$this->_debug['path'] = $path;
		return $this;
	}
	
	/**
	 * @param mixed $payload
	 *
	 * @return $this
	 */
	public function setPayload($payload)
	{
		$this->_debug['payload'] = $payload;
		return $this;
	}
	
	/**
	 * @param mixed $method
	 *
	 * @return $this
	 */
	public function setMethod($method)
	{
		$this->_debug['method'] = $method;
		return $this;
	}
	
	/**
	 * @param $response
	 *
	 * @return $this
	 */
	public function setResponse($response)
	{
		$this->_debug['response'] = $response;
		return $this;
	}
	
	/**
	 * @return array
	 */
	public function getDebugData()
	{
		return $this->_debug;
	}
}