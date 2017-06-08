<?php

namespace InsalesApi;

use InsalesApi\Api\Webhook\Webhook;

class InsalesAPI
{
	/**
	 * @var TransportInterface
	 */
	protected $transport;

	public function __construct(TransportInterface $transport)
	{
		$this->transport = $transport;
	}

	public function webhook()
	{
		return new Webhook($this->transport);
	}
}