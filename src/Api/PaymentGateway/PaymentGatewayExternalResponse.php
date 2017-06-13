<?php

namespace InsalesApi\Api\PaymentGateway;

class PaymentGatewayExternalResponse extends PaymentGatewayResponse
{
	public $password;
	public $url;
	public $shop_id;
	public $success_url;
	public $fail_url;
	public $server_url;
}