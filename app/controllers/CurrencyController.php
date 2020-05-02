<?php

namespace app\controllers;

use app\models\Cart;
use app\views\currency\Currency;
use core\mvc\Controller;

class CurrencyController extends Controller
{
    public function changeAction()
    {
        $curr = $_GET['curr'] ?? null;

        if($curr) {
            $currObj = new Currency();
            $currency = $currObj->getCurrencyByCode($curr);
            if(!empty($currency)) {
                setcookie('currency', $curr, time() + 3600 * 24 * 7, "/");
                Cart::reCalculate($currency);
            }
        }
        redirect();
    }
}