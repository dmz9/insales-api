<?php

namespace InsalesApi\Api\PaymentGateway;

use InsalesApi\Api\AbstractResponseCollection;

/**
 * Class PaymentGatewayResponseCollection
 *
 * @package InsalesApi\Api\PaymentGateway
 * @method PaymentGatewayResponse[]|PaymentGatewayExternalResponse[] all
 */
class PaymentGatewayResponseCollection extends AbstractResponseCollection
{

	protected $itemClass;

	public function __construct(array $decodedResponse, $originResponse, $headers, $request = null)
	{
		$this->itemClass = __NAMESPACE__ . '\PaymentGatewayResponse';
		parent::__construct(
			$decodedResponse,
			$originResponse,
			$headers,
			$request = null
		);
	}

	protected function buildItem($itemData)
	{
		if ($itemData['type'] == PaymentGatewayExternalRequest::TYPE_EXTERNAL) {
			return new PaymentGatewayExternalResponse(
				$itemData,
				null,
				null
			);
		}
		return new PaymentGatewayResponse(
			$itemData,
			null,
			null
		);
	}
}