<?php

namespace InsalesApi\Api\Order\Partial;

use InsalesApi\Api\AbstractPartial;
use InsalesApi\Api\Shared\FieldValue;

class ShippingAddress extends AbstractPartial
{
	public $id;
	public $name;
	public $surname;
	public $middlename;
	public $phone;
	public $full_name;
	public $full_delivery_address;
	public $address;
	public $country;
	public $state;
	public $city;
	public $zip;
	public $street;
	public $house;
	public $flat;
	public $fields_values = array();

	public function setFields_values(array $fieldsValues)
	{
		foreach ($fieldsValues as $fieldValue) {
			$this->fields_values[] = new FieldValue($fieldValue);
		}
	}
}