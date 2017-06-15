<?php

namespace InsalesApi\Api\Order;

use InsalesApi\Api\AbstractResponse;
use InsalesApi\Api\Client\Client;
use InsalesApi\Api\Client\ClientIndividualResponse;
use InsalesApi\Api\Client\ClientJuridicalResponse;
use InsalesApi\Api\Order\Partial\CustomStatus;
use InsalesApi\Api\Order\Partial\ShippingAddress;
use InsalesApi\Api\Shared\FieldValue;
use InsalesApi\Api\Order\Partial\OrderLine;
use InsalesApi\Exception\MalformedResponseException;

class OrderResponse extends AbstractResponse
{
	/**
	 * @var OrderLine[]
	 */
	public $order_lines = array();
	public $fields_values = array();
	/**
	 * @var ShippingAddress
	 */
	public $shipping_address;
	public $discount;
	public $order_changes = array();//todo implement order changes
	public $client;
	public $discounts = array();
	public $total_price;
	public $items_price;//todo implement discounts
	public $id;
	public $key;
	public $number;
	public $comment;
	public $delivery_title;
	public $delivery_description;
	public $delivery_price;
	public $full_delivery_price;
	public $payment_description;
	public $payment_title;
	public $first_referer;
	public $first_current_location;
	public $first_query;
	public $first_source_domain;
	public $first_source;
	public $referer;
	public $current_location;
	public $query;
	public $source_domain;
	public $source;
	public $fulfillment_status;
	/**
	 * @var CustomStatus
	 */
	public $custom_status;
	public $delivered_at;
	public $accepted_at;
	public $created_at;
	public $updated_at;
	public $financial_status;
	public $delivery_date;
	public $delivery_from_hour;
	public $delivery_to_hour;
	public $paid_at;
	public $delivery_variant_id;
	public $payment_gateway_id;
	public $margin;
	public $client_transaction_id;
	public $currency_code;
	public $cookies;
	public $account_id;
	public $manager_comment;
	public $locale;
	public $ya_id;

	public function setShipping_address(array $shippingAddress)
	{
		$this->shipping_address = new ShippingAddress($shippingAddress);
		return $this;
	}

	public function setClient(array $clientData)
	{
		if (!isset($clientData['type']) || empty($clientData['type'])) {
			throw new MalformedResponseException("Client data should have type property!");
		}
		switch ($clientData['type']) {
			case Client::CLIENT_TYPE_INDIVIDUAL:
				$this->client = new ClientIndividualResponse(
					$clientData,
					null,
					null
				);
				break;
			case Client::CLIENT_TYPE_JURIDICAL:
				$this->client = new ClientJuridicalResponse(
					$clientData,
					null,
					null
				);
				break;
			default:
				throw new MalformedResponseException("Wrong client data type!");
		}
		return $this;
	}

	public function setCustom_status(array $status)
	{
		$this->custom_status = new CustomStatus($status);
	}

	public function setOrder_lines(array $orderLines)
	{
		foreach ($orderLines as $orderLine) {
			$this->order_lines[] = new OrderLine($orderLine);
		}
	}

	public function setFields_values(array $fieldsValues)
	{
		foreach ($fieldsValues as $fieldValue) {
			$this->fields_values[] = new FieldValue($fieldValue);
		}
	}
}