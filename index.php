<?php

/* 1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, 
у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование? */


abstract class Product {

	protected static $cost = 100;

	abstract public function getFinalCost();
}

class DigitalProduct extends Product {

	public function getFinalCost() {
		return self::$cost/2;
	}

}

class PeiceProduct extends Product {

	public function getFinalCost() {
		return self::$cost;
	}

}

class WeightProduct extends Product {
	private $quantity;

	public function __construct() {
		$this->quantity = 0;
	}

	public function setQty($quantity) {
		$this->quantity = $quantity;
	}

	public function getQty($quantity) {
		$this->quantity = $quantity;
	}

	public function getFinalCost() {
		return $this->quantity * self::$cost;
	}
}

$prod1 = new DigitalProduct();
$prod2 = new PeiceProduct();
$prod3 = new WeightProduct();

$prod3->setQty(1.5);

echo "Стоимость цифрового товара {$prod1->getFinalCost()} <br/>";
echo "Стоимость штучного товара {$prod2->getFinalCost()} <br/>";
echo "Стоимость весового товара {$prod3->getFinalCost()} <br/><hr>";


    