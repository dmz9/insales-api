<?php

namespace InsalesApi\Api;

use InsalesApi\Exception\SDKException;
use InsalesApi\TransportInterface;

class AbstractApi
{
	const MESSAGE_FORMAT_JSON = 'json';
	const MESSAGE_FORMAT_XML = 'xml';
	/**
	 * @var TransportInterface
	 */
	protected $transport;
	/**
	 * путь к апи типа /admin/что-то-там
	 * @var string
	 */
	protected $path = '';
	/**
	 * формат общения с апи - xml/json
	 * @var string 'xml' | 'json'
	 */
	protected $messageFormat = '';

	public function __construct(TransportInterface $transport, $format = self::MESSAGE_FORMAT_JSON)
	{
		if (empty($this->path)) {
			throw new SDKException('Define API path before constructing client instance!');
		}
		if (!in_array(
			$format,
			array(
				self::MESSAGE_FORMAT_JSON,
				self::MESSAGE_FORMAT_XML
			)
		)) {
			throw new SDKException('Unsupported message format ' . $format . '! Use xml or json.');
		} else if ($format == self::MESSAGE_FORMAT_XML) {
			if (!class_exists('SimpleXMLElement')) {
				throw new SDKException('XML Module not found - it is required to parse XML messages');
			}
		}
		$this->transport     = $transport;
		$this->messageFormat = $format;
	}
}
