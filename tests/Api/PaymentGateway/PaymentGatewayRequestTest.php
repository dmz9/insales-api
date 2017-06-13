<?php

use PHPUnit\Framework\TestCase;

class PaymentGatewayRequestTest extends TestCase
{
	public function testConstruct()
	{
		$data = array(
			'title'       => '123',
			'margin'      => '2',
			'type'        => \InsalesApi\Api\PaymentGateway\PaymentGatewayRequest::TYPE_CUSTOM,
			'description' => 'asd'
		);
		$test =  \InsalesApi\Api\PaymentGateway\PaymentGatewayRequest::fromArray($data);
		$testArray=$test->asArray();
		$this->assertEquals($data,$testArray);
	}
}
