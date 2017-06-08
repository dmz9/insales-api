<?php

namespace InsalesApi\Api\Webhook;

use InsalesApi\Api\AbstractApi;
use InsalesApi\Api\StatusResponse;
use InsalesApi\Exception\ApiException;
use InsalesApi\TransportInterface;

class Webhook extends AbstractApi
{
	const FORMAT_JSON = 'json';
	const FORMAT_XML = 'xml';
	const TOPIC_ORDERS_CREATE = 'orders/create';
	const TOPIC_ORDERS_UPDATE = 'orders/update';
	protected $path = 'admin/webhooks';

	public function getList()
	{
		$rawResponse = $this->transport->executeRequest(
			TransportInterface::METHOD_GET,
			"{$this->path}.{$this->messageFormat}"
		);

		return new WebhookResponseCollection(
			$rawResponse,
			null,
			$this->messageFormat,
			$this->transport->getHeaders()
		);
	}

	public function get($webhookId)
	{
		$rawResponse = $this->transport->executeRequest(
			TransportInterface::METHOD_GET,
			"{$this->path}/$webhookId.{$this->messageFormat}"
		);
		return new WebhookResponse(
			$rawResponse,
			$webhookId,
			$this->messageFormat,
			$this->transport->getHeaders()
		);
	}

	public function destroy($webhookId)
	{
		$rawResponse = $this->transport->executeRequest(
			TransportInterface::METHOD_DELETE,
			"{$this->path}/$webhookId.{$this->messageFormat}"
		);
		return new StatusResponse(
			$rawResponse,
			$webhookId,
			$this->messageFormat,
			$this->transport->getHeaders()
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

		$rawResponse = $this->transport->executeRequest(
			TransportInterface::METHOD_POST,
			"{$this->path}.{$this->messageFormat}",
			$payload
		);

		return new WebhookResponse(
			$rawResponse,
			$payload,
			$this->messageFormat,
			$this->transport->getHeaders()
		);
	}
}
