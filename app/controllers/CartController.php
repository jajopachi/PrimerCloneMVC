<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Products;
use core\mvc\Controller;

class CartController extends Controller
{
    public function addAction()
    {
        $id = $_GET['id'] ?? null;
        $qty = $_GET['qty'] ?? null;

        $prodObj = new Products();
        if($id) {
            $product = $prodObj->getProduct($id);
            if(!$product) {
                return false;
            }
        }

        $cart = new Cart();
        $cart->addToCart($product);


        if($this->isAJAX()) {
            $this->loadView("cart_modal");
        }else{
            redirect();
        }
    }

    public function clearAction()
    {
        $cart = new Cart();
        $cart->clearCart();

        if($this->isAJAX()) {
            $this->loadView("cart_modal");
        }else{
            redirect();
        }
    }

    public function deleteAction()
    {
        $id = $_GET['id'] ?? null;

        $cart = new Cart();
        $cart->deleteFromCart($id);

        if($this->isAJAX()) {
            $this->loadView("cart_modal");
        }else{
            redirect();
        }
    }
}