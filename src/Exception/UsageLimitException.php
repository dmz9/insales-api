<?php
namespace InsalesApi\Exception;
class UsageLimitException extends ApiException{
	private $expires=null;
	
	/**
	 * @return null
	 */
	public function getExpires()
	{
		return $this->expires;
	}
	
	/**
	 * @param null $expires
	 *
	 * @return UsageLimitException
	 */
	public function setExpires($expires)
	{
		$this->expires = $expires;
		return $this;
	}
	
}