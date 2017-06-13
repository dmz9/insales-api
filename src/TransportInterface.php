<?php

namespace InsalesApi;
interface TransportInterface
{
	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';
	const METHOD_PUT = 'PUT';
	const METHOD_DELETE = 'DELETE';
	
	public function setHeaders(array $headers);
	
	public function setTimeout($timeout);
	
	/**
	 * @return array
	 */
	public function getResponseHeaders($which=null);
	
	public function getHttpCode();
	
	public function getResponseBody();
	
	public function getRequestPath();
	
	public function getRequestMethod();
	
	public function get($path);
	
	public function post($path, $payload = null);
	
	public function put($path, $payload = null);
	
	public function delete($path, $payload = null);
}
