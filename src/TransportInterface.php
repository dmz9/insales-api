<?php

namespace InsalesApi;
interface TransportInterface
{
	const METHOD_POST = 'POST';
	const METHOD_GET = 'GET';
	const METHOD_PUT = 'PUT';
	const METHOD_DELETE = 'DELETE';

	/**
	 * @param      $method
	 * @param      $path
	 * @param null $payload
	 * @return mixed
	 */
	public function executeRequest($method, $path, $payload = null);

	/**
	 * @return array
	 */
	public function getHeaders();
}
