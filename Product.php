<?php

class Product {
    protected $price;

   /**
    * @return mixed
    */
    public function getPrice(){
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price){
        $this->price = $price;
    }
}