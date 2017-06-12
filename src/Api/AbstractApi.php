<?php

namespace InsalesApi\Api;

use InsalesApi\Exception\SDKException;
use InsalesApi\Helper;
use InsalesApi\InsalesAPI;
use InsalesApi\TransportInterface;

class AbstractApi
{
	/**
	 * @var TransportInterface
	 */
	protected $transport;
	/**
	 * путь к апи типа /admin/что-то-там
	 *
	 * @var string
	 */
	protected $path = '';
	/**
	 * формат общения с апи - xml/json
	 *
	 * @var string 'xml' | 'json'
	 */
	protected $messageFormat = '';

	
	public function __construct(TransportInterface $transport, $messageFormat)
	{
		if (empty($this->path)) {
			throw new SDKException('Define API path before constructing client instance!');
		}
		
		$this->transport     = $transport;
		$this->messageFormat = $messageFormat;
	}
	
	/**
	 * @param $data
	 *
	 * @return array
	 * @throws SDKException
	 */
	protected function convert($data)
	{
		if ($this->messageFormat == InsalesAPI::MESSAGE_FORMAT_JSON) {
			return (array)json_decode(
				$data,
				1
			);
		}
		if ($this->messageFormat == InsalesAPI::MESSAGE_FORMAT_XML) {
			$xml = new \SimpleXMLElement($data);
			return Helper::XML2Array($xml);
		}
		throw new SDKException("Unknown message format {$this->messageFormat}");
	}
}
