<?php

use PHPUnit\Framework\TestCase;

class PaymentGatewayResponseTest extends TestCase
{
	public function testConstruct()
	{
		$data = '{
  "created_at": "2017-06-09T16:58:01+03:00",
  "id": 9,
  "margin": "10.0",
  "position": 3,
  "type": "PaymentGateway::Cod",
  "updated_at": "2017-06-09T16:58:01+03:00",
  "title": "cash on delivery",
  "description": "text",
  "payment_delivery_variants": [
    {
      "created_at": "2017-06-09T16:58:01+03:00",
      "delivery_variant_id": 1,
      "id": 46
    }
  ]
}';
		
		$test = new \InsalesApi\Api\PaymentGateway\PaymentGatewayResponse(
			json_decode(
				$data,
				1
			),
			$data,
			array()
		);
		$mock = new \InsalesApi\Api\PaymentGateway\Partial\PaymentDeliveryVariant(
			json_decode(
				'{
      "created_at": "2017-06-09T16:58:01+03:00",
      "delivery_variant_id": 1,
      "id": 46
    }',
				1
			)
		);
		
		$this->assertEquals(
			$mock,
			$test->payment_delivery_variants[0]
		);
	}
}