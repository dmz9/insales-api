<?php

namespace InsalesApi;

use InsalesApi\Exception\SDKException;

/**
 * class for accepting webhook payloads at the endpoint
 *
 * Class WebhookAcceptor
 * @package InsalesApi
 */
class WebhookAcceptor
{
	public static function acceptPayload($string = null)
	{
		$payload = trim((string)$string);
		if (empty($payload)) {
			throw new SDKException("Empty incoming data!");
		}
		if (strpos(
				$payload,
				'<?xml'
			) === 0) {
			// trying to decode xml
			$xml = new \SimpleXMLElement($payload);
			$decoded = Helper::XML2Array($xml);
		} else {
			// tring to parse json
			$decoded = json_decode(
				$payload,
				1
			);
		}
		return new Api\Order\OrderResponse($decoded,$string,null);
	}
}