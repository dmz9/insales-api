<?php

class WebhookCollectionTest extends \PHPUnit\Framework\TestCase
{
	public $origin;
	public $response;
	public $headers;
	public $request;
	
	public function setUp()
	{
		$this->origin   = '[
  {
    "address": "http://app.ru/orders/create",
    "created_at": "2017-06-09T16:57:53+03:00",
    "id": 14,
    "topic": "orders/create",
    "format_type": "xml"
  }
]';
		$this->response = json_decode(
			$this->origin,
			1
		);
		$this->headers  = array();
		$this->request  = null;
	}
	
	public function tearDown()
	{
	
	}
	
	public function testConstruct()
	{
		$collection = new \InsalesApi\Api\Webhook\WebhookResponseCollection(
			$this->response,
			$this->origin,
			$this->headers,
			$this->request
		);
		$this->assertEquals(
			false,
			$collection->isEmpty()
		);
		
		foreach ($collection->all() as $item) {
			$this->assertInstanceOf(
				\InsalesApi\Api\Webhook\WebhookResponse::fqcn(),
				$item
			);
		}
	}
}