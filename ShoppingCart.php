<?php

/**
 * Created by PhpStorm.
 * User: bolaj
 * Date: 7/25/2018
 * Time: 3:00 PM
 */
class ShoppingCart
{
    public $item = [];
    public $deliveryFee;
    public $netTotal;
    public $grossTotal;

    /**
     * @return int
     */
    public function calculateDeliveryFee() {
        $number_of_items = count($this->item);
        $this->deliveryFee = 50 * $number_of_items;

        return $this->deliveryFee;
    }

    public function addItem($name, $quantity, $price) {
        $this->item[$name] = $price;
        $this->grossTotal += $price * $quantity;
        $this->calculateDeliveryFee();
        $this->netTotal += $this->grossTotal + $this->deliveryFee;

        return $this->item;
    }

    public function removeItem($name, $quantity, $price) {
        unset($this->item[$name]);
        $this->grossTotal -= $price * $quantity;
        $this->calculateDeliveryFee();
        $this->netTotal += $this->grossTotal + $this->deliveryFee;

        return $this->item;
    }

    public function checkout($paid_amount) {
        if($paid_amount < $this->netTotal) {
            return "Insufficient fund";
        }

        $balance = $this->netTotal - $paid_amount;
        unset($this->item); // $foo is gone
        $this->item = array();

        return $balance;
    }

}