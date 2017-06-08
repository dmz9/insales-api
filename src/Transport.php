<?php

namespace InsalesApi;
class Transport implements TransportInterface
{

	protected $basePath='';

	public function __construct($apiKey, $apiToken, $domain, $useHttps = true)
	{
		$this->basePath = $useHttps
			? "https://$apiKey:$apiToken@$domain/"
			: "http://$apiKey:$apiToken@$domain/";
	}

	public function executeRequest($method, $path, $payload = null)
	{

		$fullPath = $this->basePath . ltrim(
				$path,
				'/'
			);
		// TODO: Implement executeRequest() method.
	}

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return array();
	}
}