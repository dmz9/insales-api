<?php

namespace InsalesApi\Api\Order\Partial;

use InsalesApi\Api\AbstractPartial;

class OrderLine extends AbstractPartial
{
	public $id;
	public $order_id;
	public $sale_price;
	public $full_sale_price;
	public $total_price;
	public $full_total_price;
	public $discounts_amount;
	public $quantity;
	public $reserved_quantity;
	public $weight;
	public $variant_id;
	public $product_id;
	public $sku;
	public $barcode;
	public $title;
	public $unit;
	public $comment;
	public $updated_at;
	public $created_at;
}