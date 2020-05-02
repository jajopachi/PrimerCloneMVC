<?php

namespace app\models;

use core\App;

class Cart
{
    public function addToCart($product)
    {
        $_SESSION['cart.currency'] = App::$app->getProperty("currency");
        $currency = $_SESSION['cart.currency']['value'];

        $ID = $product['id'];
        $qty = $product['quantity'];
        $price = $product['price'];
        $name = $product['name'];
        $desc = $product['description'];
        $alias = $product['alias'];
        $categoryID = $product['category_id'];

        if(isset($_SESSION['cart'][$ID])) {
            $_SESSION['cart'][$ID]['qty'] += $qty;
            $_SESSION['cart'][$ID]['all_price'] =  round($_SESSION['cart'][$ID]['qty'] * $_SESSION['cart'][$ID]['price'] * $currency, 2);
        }else{
            $_SESSION['cart'][$ID] = [
                "id" => $ID,
                "qty" => $qty,
                "price" => $price,
                "all_price" => round($qty * $price * $currency, 2),
                "name" => $name,
                "desc" => $desc,
                "alias" => $alias,
                "categoryID" => $categoryID,
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price * $currency :
            $qty * $price * $currency;
        $_SESSION['cart.sum'] = round($_SESSION['cart.sum'], 2);

    }

    public function deleteFromCart($id)
    {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['all_price'];
            unset($_SESSION['cart'][$id]);
        }
    }

    public function clearCart()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.currency']);
    }

    public static function reCalculate($currency)
    {
        if(isset($_SESSION['cart.currency'])) {

            $cartCurr = $_SESSION['cart.currency']['value'];
            $cartSum = $_SESSION['cart.sum'];

            foreach ($_SESSION['cart'] as &$product) {
                $product['price'] = round(( $product['price'] / $cartCurr ) * $currency['value'], 2);
                $product['all_price'] = round( ($product['all_price'] / $cartCurr) * $currency['value'],2);
            }

            $_SESSION['cart.sum'] = round( ($cartSum / $cartCurr) * $currency['value'],2);
            $_SESSION['cart.currency'] = $currency;
        }

    }
}