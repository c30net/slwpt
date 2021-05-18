<?php
interface Shipping_Method
{
	public function getName();
}

class ShippingByCar implements Shipping_Method
{
	protected $name;

	public function __construct(  ) {
		$this->name = 'تحویل با ماشین';
	}
	public function getName() {
		return $this->name;
	}
}

class ShippingByPlane implements Shipping_Method
{
	protected $name;
	public function __construct(  ) {
		$this->name = 'تحویل با هواپیما';
	}
	public function getName() {
		return $this->name;
	}
}

class ShippingByHand implements Shipping_Method
{
	protected $name;
	public function __construct(  ) {
		$this->name = 'تحویل دستی';
	}
	public function getName() {
		return $this->name;
	}
}


class ShippingByTrain implements Shipping_Method
{
	protected $name;

	public function __construct(  ) {
		$this->name = 'تحویل با قطار';
	}
	public function getName(  ) {
		return $this->name;
	}
}

add_filter('shipping_methods', function($methods)
{
	$methods[] = 'ShippingByTrain';
	return $methods;
}
);

$shipping_methods = array('ShippingByCar', 'ShippingByPlane', 'ShippingByHand');
$shipping_methods = apply_filters('shipping_methods', $shipping_methods);

foreach ($shipping_methods as $shipping_method)
{
	$obj = new $shipping_method;
	echo '<input type="radio" name="shipping">'.$obj->getName();
}