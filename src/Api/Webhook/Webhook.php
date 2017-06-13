<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractApi;
use InsalesApi\Api\StatusResponse;
use InsalesApi\Exception\ApiException;

/**
 * Class Webhook
 *
 * @package InsalesApi\Api\Webhook
 */
class Webhook extends AbstractApi
{
	const FORMAT_JSON = 'json';
	const FORMAT_XML = 'xml';
	const TOPIC_ORDERS_CREATE = 'orders/create';
	const TOPIC_ORDERS_UPDATE = 'orders/update';
	protected $path = 'admin/webhooks';
	
	/**
	 * @return \InsalesApi\Api\Webhook\WebhookResponseCollection
	 */
	public function getList()
	{
		$rawResponse = $this->transport->get("{$this->path}.{$this->messageFormat}");
		
		return new WebhookResponseCollection(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders()
		);
	}
	
	public function get($webhookId)
	{
		$rawResponse = $this->transport->get(
			"{$this->path}/$webhookId.{$this->messageFormat}"
		);
		
		return new WebhookResponse(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$webhookId
		);
	}
	
	public function destroy($webhookId)
	{
		$rawResponse = $this->transport->delete(
			"{$this->path}/$webhookId.{$this->messageFormat}"
		);
		
		return new StatusResponse(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$webhookId
		);
	}
	
	public function create($callbackUrl, $topic, $format = self::FORMAT_JSON)
	{
		
		if (!in_array(
			$topic,
			array(
				self::TOPIC_ORDERS_CREATE,
				self::TOPIC_ORDERS_UPDATE
			)
		)) {
			throw new ApiException('Unknown topic for webhook');
		}
		if (!in_array(
			$format,
			array(
				self::FORMAT_JSON,
				self::FORMAT_XML
			)
		)) {
			throw new ApiException('Unknown format for webhook');
		}
		if (empty($callbackUrl)) {
			throw new ApiException('Empty callback url for webhook not allowed');
		}
		if (false === strpos(
				$callbackUrl,
				'http'
			)) {
			throw new ApiException('Callback url should be full url address starting with `http...` !');
		}
		
		$payload = array(
			'address' => $callbackUrl,
			'topic'   => $topic,
			'format'  => $format
		);
		
		$rawResponse = $this->transport->post(
			"{$this->path}.{$this->messageFormat}",
			$this->prepare(
				$payload,
				'webhook'
			)
		);
		
		return new WebhookResponse(
			$this->convert($rawResponse),
			$rawResponse,
			$this->transport->getResponseHeaders(),
			$payload
		);
	}
}
