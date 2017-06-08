<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractResponse;

class WebhookResponse extends AbstractResponse
{
	public $address;
	public $created_at;
	public $id;
	public $topic;
	public $format_type;
}