<?php

namespace InsalesApi\Exception;
class NotFoundException extends ApiException
{
	private $path;
	private $payload;
	private $method;
	private $responseHeaders;
	
	/**
	 * @param mixed $responseHeaders
	 *
	 * @return NotFoundException
	 */
	public function setResponseHeaders($responseHeaders)
	{
		$this->responseHeaders = $responseHeaders;
		return $this;
	}
	/**
	 * @param mixed $path
	 *
	 * @return NotFoundException
	 */
	public function setPath($path)
	{
		$this->path = $path;
		return $this;
	}
	
	/**
	 * @param mixed $payload
	 *
	 * @return NotFoundException
	 */
	public function setPayload($payload)
	{
		$this->payload = $payload;
		return $this;
	}
	
	/**
	 * @param mixed $method
	 *
	 * @return NotFoundException
	 */
	public function setMethod($method)
	{
		$this->method = $method;
		return $this;
	}
}