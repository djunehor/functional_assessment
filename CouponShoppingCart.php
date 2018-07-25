<?php

/**
 * Created by PhpStorm.
 * User: bolaj
 * Date: 7/25/2018
 * Time: 3:23 PM
 */
class CouponShoppingCart extends ShoppingCart
{

    public function Coupon($coupon_code) {
        if($coupon_code == 'SUPERMART_DEV ') {
            $this->netTotal = $this->netTotal - 1000;
        }
    }
}