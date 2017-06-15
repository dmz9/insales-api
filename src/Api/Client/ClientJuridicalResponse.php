<?php

namespace InsalesApi\Api\Client;

use InsalesApi\Api\AbstractResponse;
use InsalesApi\Api\Shared\FieldValue;

class ClientJuridicalResponse extends AbstractResponse
{
	public $bank_name;
	public $bik;
	public $bonus_points;
	public $client_group_id;
	public $correspondent_account;
	public $created_at;
	public $email;
	public $id;
	public $inn;
	public $ip_addr;
	public $juridical_address;
	public $kpp;
	public $name;
	public $ogrn;
	public $okpo;
	public $phone;
	public $registered;
	public $settlement_account;
	public $subscribe;
	public $type;
	public $updated_at;
	public $progressive_discount;
	public $group_discount;
	public $fields_values = array();

	public function setFields_values(array $fieldsValues)
	{
		foreach ($fieldsValues as $fieldsValue) {
			$this->fields_values[] = new FieldValue($fieldsValue);
		}
		return $this;
	}
}