<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractCollection;

/**
 * Class WebhookResponseCollection
 *
 * @package InsalesApi\Api\Webhook
 *
 * @method WebhookResponse[] all
 */
class WebhookResponseCollection extends AbstractCollection
{
	public function __construct($originResponse, array $decodedResponse, $headers, $request = null)
	{
		$this->itemClass = __NAMESPACE__ . '\WebhookResponse';
		parent::__construct(
			$originResponse,
			$decodedResponse,
			$headers,
			$request = null
		);
	}
}
