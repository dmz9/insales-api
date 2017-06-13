<?php

namespace InsalesApi\Api;
use InsalesApi\Builder;

abstract class AbstractPartial
{
	public function __construct($data)
	{
		Builder::populate(
			$this,
			$data
		);
	}
}