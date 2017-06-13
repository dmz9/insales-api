<?php

namespace InsalesApi\Api\PaymentGateway;

use InsalesApi\Exception\SDKException;

class PaymentGatewayExternalRequest extends PaymentGatewayRequest
{
	const TYPE_EXTERNAL = 'PaymentGateway::External';
	/**
	 * @var string external system payment endpoint
	 */
	protected $url;
	/**
	 * @var mixed external system shop id
	 */
	protected $shop_id;
	
	/**
	 * @param string $url
	 *
	 * @return PaymentGatewayExternalRequest
	 */
	public function setUrl($url)
	{
		$this->_container['url'] = $url;
		return $this;
	}
	
	/**
	 * @param mixed $shop_id
	 *
	 * @return PaymentGatewayExternalRequest
	 */
	public function setShopId($shop_id)
	{
		$this->_container['shop_id'] = $shop_id;
		return $this;
	}
	
	public function setType($type)
	{
		if ($type != self::TYPE_EXTERNAL) {
			throw new SDKException("Wrong `type` given for " . get_called_class());
		}
		$this->_container['type'] = $type;
		return $this;
	}
}