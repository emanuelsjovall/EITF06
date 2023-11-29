<?php
class ShoppingCart {
    private $dictionaryProducts;

    public function __construct() {
        $this->dictionaryProducts = array();
    }

    public function addProduct($productName, $price, $quantity) {
        if (isset($this->dictionaryProducts[$productName])) {
            $this->dictionaryProducts[$productName]['quantity'] += $quantity;
        } else {
            $this->dictionaryProducts[$productName] = array(
                'price' => $price,
                'quantity' => $quantity
            );
        }
    }

    public function removeProduct($productName) {
        if (isset($this->dictionaryProducts[$productName])) {
            unset($this->dictionaryProducts[$productName]);
        }
    }

    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->dictionaryProducts as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }
        return $totalPrice;
    }

    public function toString() {
        $output = "Shopping Chart:</br>";
        foreach ($this->dictionaryProducts as $productName => $product) {
            $output .= "$productName - Price: {$product['price']}, Quantity: {$product['quantity']}</br>";
        }
        $output .= "</br>Total Price: {$this->getTotalPrice()}</br>";
        return $output;
    }
}
?>