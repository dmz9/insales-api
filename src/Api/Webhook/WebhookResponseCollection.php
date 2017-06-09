<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractCollection;

/**
 * Class WebhookResponseCollection
 * @package InsalesApi\Api\Webhook
 *
 * @method WebhookResponse[] all
 */
class WebhookResponseCollection extends AbstractCollection
{

	/**
	 * WebhookResponseCollection constructor.
	 */
	public function __construct()
	{
		$this->itemClass = __NAMESPACE__ . "\WebhookResponse";
		parent::__construct();
	}
}
