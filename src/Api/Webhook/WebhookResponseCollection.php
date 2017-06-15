<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractResponseCollection;

/**
 * Class WebhookResponseCollection
 *
 * @package InsalesApi\Api\Webhook
 *
 * @method WebhookResponse[] all
 */
class WebhookResponseCollection extends AbstractResponseCollection
{
	protected $itemClass;

	public function __construct(array $decodedResponse, $originResponse, $headers, $request = null)
	{
		$this->itemClass = __NAMESPACE__ . '\WebhookResponse';
		parent::__construct(
			$decodedResponse,
			$originResponse,
			$headers,
			$request = null
		);
	}
}
