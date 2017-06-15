<?php

namespace InsalesApi\Api\Shared;

use InsalesApi\Api\AbstractPartial;

/**
 * поля используются в некоторых сущностях как составные части
 *
 * Class FieldValue
 * @package InsalesApi\Api\Shared
 */
class FieldValue extends AbstractPartial
{
	public $created_at;
	public $field_id;
	public $id;
	public $updated_at;
	public $value;
	public $type;
	public $name;
}