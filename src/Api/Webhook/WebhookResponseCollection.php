<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractCollection;

class WebhookResponseCollection extends AbstractCollection
{
	public function __construct()
	{
		$this->itemClass = __NAMESPACE__ . "\WebhookResponse";
		parent::__construct();
	}
}
