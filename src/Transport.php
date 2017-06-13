<?php

namespace InsalesApi;

use InsalesApi\Exception\SDKException;

class Transport implements TransportInterface
{
	protected $basePath = '';
	protected $responseHeaders = array();
	protected $requestHeaders = array();
	protected $httpCode;
	protected $responseBody;
	/**
	 * @var int timeout in seconds for request
	 */
	protected $timeout = 30;
	
	public function __construct($apiKey, $apiToken, $domain, $useHttps = true)
	{
		$this->basePath = $useHttps
			? "https://$apiKey:$apiToken@$domain/"
			: "http://$apiKey:$apiToken@$domain/";
	}
	
	/**
	 * @param array $requestHeaders
	 *
	 * @return Transport
	 */
	public function setRequestHeaders($requestHeaders)
	{
		$this->requestHeaders = $requestHeaders;
		return $this;
	}
	
	/**
	 * @param int $timeout
	 *
	 * @return Transport
	 */
	public function setTimeout($timeout)
	{
		$this->timeout = $timeout;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getHttpCode()
	{
		return $this->httpCode;
	}
	
	/**
	 * @return mixed
	 */
	public function getResponseBody()
	{
		return $this->responseBody;
	}
	
	public function executeRequest($method, $path, $payload = null)
	{
		$method = strtoupper($method);
		$path   = $this->basePath . ltrim(
				$path,
				'/'
			);
		
		$this->_checkArgs(
			$method
		);
		
		$ch = $this->_configureCurl(
			$method,
			$path,
			$payload
		);
		
		$chResult = curl_exec($ch);
		
		$result = explode(
			"\r\n\r\n",
			$chResult,
			2
		);
		
		$this->responseHeaders = $this->_parseHeaders($result[0]);
		$this->responseBody    = $result[1];
		$this->httpCode        = curl_getinfo(
			$ch,
			CURLINFO_HTTP_CODE
		);
		
		curl_close($ch);
		
		return $this;
	}
	
	/**
	 * @return array
	 */
	public function getResponseHeaders()
	{
		return $this->responseHeaders;
	}
	
	public function get($path)
	{
		return $this->executeRequest(
			self::METHOD_GET,
			$path
		);
	}
	
	public function post($path, $payload = null)
	{
		return $this->executeRequest(
			self::METHOD_POST,
			$path,
			$payload
		);
	}
	
	public function put($path, $payload = null)
	{
		return $this->executeRequest(
			self::METHOD_PUT,
			$path,
			$payload
		);
	}
	
	public function delete($path, $payload = null)
	{
		return $this->executeRequest(
			self::METHOD_DELETE,
			$path,
			$payload
		);
	}
	
	public function setHeaders(array $headers)
	{
		return $this->setRequestHeaders($headers);
	}
	
	private function _curlDefaults()
	{
		return array(
			CURLOPT_HEADER         => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT        => $this->timeout,
			CURLOPT_CONNECTTIMEOUT => $this->timeout,
			CURLOPT_HTTPHEADER     => $this->requestHeaders,
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_MAXREDIRS      => 3,
		);
	}
	
	private function _configureCurl($method, $path, $payload)
	{
		$conf              = $this->_curlDefaults();
		$conf[CURLOPT_URL] = $path;
		
		if ('POST' == $method) {
			$conf[CURLOPT_POST] = true;
		}
		if ('DELETE' == $method || 'PUT' == $method) {
			$conf[CURLOPT_CUSTOMREQUEST] = $method;
		}
		if ('GET' != $method) {
			if (!empty($payload)) {
				if (is_array($payload)) {
					$payload = http_build_query($payload);
				}
				$conf[CURLOPT_POSTFIELDS] = $payload;
			}
		} else {
			$conf[CURLOPT_HTTPGET] = true;
		}
		
		$ch = curl_init();
		
		if (curl_setopt_array(
			$ch,
			$conf
		)) {
			return $ch;
		}
		
		throw new SDKException('Can not populate curl with options : ' . json_encode($conf));
	}
	
	private function _checkArgs($method)
	{
		if (!in_array(
			$method,
			array(
				self::METHOD_GET,
				self::METHOD_PUT,
				self::METHOD_DELETE,
				self::METHOD_POST
			)
		)) {
			throw new SDKException("Incorrect method");
		}
	}
	
	private function _parseHeaders($headers)
	{
		$result = array();
		
		if (strlen($headers) > 0
		    && strpos(
			       $headers,
			       "\n"
		       ) !== false) {
			$headers = explode(
				"\n",
				$headers
			);
			foreach ($headers as $header) {
				$xploded                   = explode(
					':',
					$header
				);
				$result[trim($xploded[0])] = trim($xploded[1]);
			}
		}
		return $result;
	}
}