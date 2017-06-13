<?php

namespace InsalesApi\Api\PaymentGateway;

use InsalesApi\Api\AbstractResponse;
use InsalesApi\Api\PaymentGateway\Partial\PaymentDeliveryVariant;

class PaymentGatewayResponse extends AbstractResponse
{
	public $created_at;
	public $id;
	public $margin;
	public $position;
	public $type;
	public $updated_at;
	public $title;
	public $description;
	public $payment_delivery_variants=array();
	
	public function setPayment_delivery_variants(array $variants)
	{
		foreach ($variants as $variant) {
			$this->payment_delivery_variants[] = new PaymentDeliveryVariant($variant);
		}
	}
}