<?php

namespace InsalesApi\Api\PaymentGateway;

use InsalesApi\Api\AbstractRequest;
use InsalesApi\Exception\SDKException;

class PaymentGatewayRequest extends AbstractRequest
{
	const TYPE_COD = 'PaymentGateway::Cod';
	const TYPE_CUSTOM = 'PaymentGateway::Custom';
	
	/**
	 * binding to delivery by delivery_id[]
	 * @param array $variants
	 */
	public function setDeliveryVariants(array $variants)
	{
		$this->_container['payment_delivery_variants_attributes'] = $variants;
	}
	
	/**
	 * @param mixed $title
	 *
	 * @return $this
	 */
	public function setTitle($title)
	{
		$this->_container['title'] = $title;
		return $this;
	}
	
	/**
	 * @param mixed $margin
	 *
	 * @return $this
	 */
	public function setMargin($margin)
	{
		$this->_container['margin'] = $margin;
		return $this;
	}
	
	/**
	 * @param mixed $position
	 *
	 * @return $this
	 */
	public function setPosition($position)
	{
		$this->_container['position'] = $position;
		return $this;
	}
	
	/**
	 * @param $type
	 *
	 * @return $this
	 * @throws SDKException
	 */
	public function setType($type)
	{
		if(!in_array($type,array(self::TYPE_COD,self::TYPE_CUSTOM))){
			throw new SDKException("Wrong `type` given for ".get_called_class());
		}
		$this->_container['type'] = $type;
		return $this;
	}
	
	/**
	 * @param mixed $description
	 *
	 * @return $this
	 */
	public function setDescription($description)
	{
		$this->_container['description'] = $description;
		return $this;
	}
}
