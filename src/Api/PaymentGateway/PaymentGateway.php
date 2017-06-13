<?php

namespace InsalesApi\Api\PaymentGateway;

use InsalesApi\Api\AbstractApi;

class PaymentGateway extends AbstractApi
{
	protected $path = 'admin/payment_gateways';
	
	public function createCod(PaymentGatewayRequest $request)
	{
		$prepared = $this->prepare(
			$request->asArray(),
			'payment-gateway'
		);
		
		$rawResponse = $this->transport->post(
			"{$this->path}.{$this->messageFormat}",
			$prepared
		);
		
		$this->expectHttpCode(201);
		
		return new PaymentGatewayResponse(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$request
		);
	}
	
	public function createCustom(PaymentGatewayRequest $request)
	{
		return $this->createCod($request);
	}
	
	public function createExternal(PaymentGatewayExternalRequest $request)
	{
		$prepared = $this->prepare(
			$request->asArray(),
			'payment-gateway'
		);
		
		$rawResponse = $this->transport->post(
			"{$this->path}.{$this->messageFormat}",
			$prepared
		);
		
		$this->expectHttpCode(201);
		
		return new PaymentGatewayExternalResponse(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$request
		);
	}
	
	public function destroy($paymentGatewayId)
	{
		$this->transport->delete(
			"$this->path/$paymentGatewayId.$this->messageFormat"
		);
		
		$this->expectHttpCode();
		
		return null;
	}
	
	public function get($paymentGatewayId)
	{
		$rawResponse = $this->transport->get(
			"$this->path/$paymentGatewayId.$this->messageFormat"
		);
		
		$decoded = $this->convert($rawResponse);
		
		if ($decoded['type'] == PaymentGatewayExternalRequest::TYPE_EXTERNAL) {
			return new PaymentGatewayExternalResponse(
				$decoded,
				$rawResponse,
				$this->transport->getResponseHeaders(),
				$paymentGatewayId
			);
		}
		
		$this->expectHttpCode(201);
		
		return new PaymentGatewayResponse(
			$decoded,
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$paymentGatewayId
		);
		
	}
	
	public function getList()
	{
		$rawResponse = $this->transport->get(
			"$this->path.$this->messageFormat"
		);
		
		$this->expectHttpCode(201);
		
		return new PaymentGatewayResponseCollection(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders()
		);
	}
}
