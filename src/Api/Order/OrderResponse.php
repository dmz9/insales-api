<?php

namespace InsalesApi\Api\Order;

use InsalesApi\Api\AbstractResponse;
use InsalesApi\Api\Order\Partial\CustomStatus;
use InsalesApi\Api\Order\Partial\FieldValue;
use InsalesApi\Api\Order\Partial\OrderLine;

class OrderResponse extends AbstractResponse
{
	/**
	 * @var OrderLine[]
	 */
	public $order_lines = array();
	public $fields_values = array();
"order_changes": [], "discount": null, "shipping_address":
{
"id": 1, "fields_values": [
{
"created_at": "2017-06-13T11:52:35+03:00", "field_id": 749, "id": 726, "updated_at": "2017-06-13T11:52:35+03:00", "value": "old value", "type": "Текст", "name": "special"
}], "name": "Tom Dellay",
    "surname": null,
    "middlename": null,
    "phone": "+7(495)212-85-06",
    "full_name": "Tom Dellay",
    "full_delivery_address": "123456, state, London, address, old value",
    "address": "address",
    "country": "RU",
    "state": "state",
    "city": "London",
    "zip": "123456",
    "street": null,
    "house": null,
    "flat": null
  },
  "client": {
	"bonus_points": 0,
    "client_group_id": null,
    "correspondent_account": null,
    "created_at": "2009-03-30T04:37:32+04:00",
    "email": "some-one@yandex.ru",
    "id": 2,
    "ip_addr": null,
    "middlename": null,
    "name": "Mortimer Hant",
    "phone": "+7(916)212-85-06",
    "registered": false,
    "settlement_account": null,
    "subscribe": true,
    "surname": null,
    "type": "Client::Individual",
    "updated_at": "2009-03-31T12:20:34+04:00",
    "progressive_discount": null,
    "group_discount": null,
    "fields_values": [
      {
	      "created_at": "2017-06-13T11:52:35+03:00",
        "field_id": 748,
        "id": 725,
        "updated_at": "2017-06-13T11:52:35+03:00",
        "value": "old value",
        "type": "Текст",
        "name": "special"
      }
    ]
  }
;  public $discounts = array();//todo implement discounts
  public $total_price;
  public $items_price;
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