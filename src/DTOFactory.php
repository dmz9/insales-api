<?php

namespace InsalesApi;

use InsalesApi\Api\AbstractCollection;
use InsalesApi\Api\AbstractResponse;
use InsalesApi\Exception\ApiException;
use InsalesApi\Exception\SDKException;

class DTOFactory
{
	/**
	 * @var string
	 */
	protected $messageFormat;
	/**
	 * @var bool
	 */
	protected $devMode;

	public function __construct($messageFormat, $devMode = false)
	{
		$this->messageFormat = $messageFormat;
		$this->devMode       = $devMode;
	}

	/**
	 * @param $data
	 * @return array
	 * @throws SDKException
	 */
	private function convert($data)
	{
		if ($this->messageFormat == 'json') {
			return (array)json_decode(
				$data,
				1
			);
		}
		if ($this->messageFormat == 'xml') {
			$xml = new \SimpleXMLElement($data);
			return Helper::XML2Array($xml);
		}
		throw new SDKException("Unknown message format {$this->messageFormat}");
	}

	/**
	 * @param $className
	 * @param $request
	 * @param $response
	 * @param $headers
	 * @return AbstractResponse
	 * @throws ApiException
	 * @throws SDKException
	 */
	public function createOne($className, $request, $response, $headers)
	{
		$decodedData = $this->convert($response);

		if (!class_exists($className)) {
			throw new SDKException("Failed to create unknown class $className");
		}

		$instance = new $className($decodedData);

		if (!($instance instanceof AbstractResponse)) {
			throw new SDKException("Class $className must extend AbstractResponse class!");
		}

		$instance->setOriginData($response)
		         ->setHeaders($headers);
		if (!empty($request)) {
			$instance->setRequest($request);
		}

		if ($this->devMode) {
			$unknownProps = $instance->getUnknownProperties();
			if (!empty($unknownProps)) {
				$exception = new ApiException("$className has unknown properties!");
				$exception->setDebugInfo($unknownProps);
				throw $exception;
			}
		}

		return $instance;
	}

	public function createCollection($className, $request, $response, $headers)
	{
		$decodedData = $this->convert($response);

		if (!class_exists($className)) {
			throw new SDKException("Failed to create unknown class $className");
		}

		if (Helper::isAssociativeArray($decodedData)) {
			throw new SDKException("Data is associative array, numeric array expected");
		}

		$collection = new $className();
		if (!($collection instanceof AbstractCollection)) {
			throw new SDKException("Class $className must extend AbstractCollection class!");
		}

		$prototype = $collection->getItemClass();
		if (!class_exists($prototype)) {
			throw new SDKException("Unknown class $prototype");
		}

		foreach ($decodedData as $itemData) {
			$item = new $prototype($itemData);
			$collection->add($item);
		}

		$collection->setOriginData($response)
		           ->setHeaders($headers);

		if (!empty($request)) {
			$collection->setRequest($request);
		}

		return $collection;
	}
}