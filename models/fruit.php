<?php
class Fruit {
    private $name;
    private $stock;
    private $price;

    public function __construct($name, $stock, $price) {
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getStock() {
        return $this->stock
;
    }

    public function getPrice() {
        return $this->price;
    }
}