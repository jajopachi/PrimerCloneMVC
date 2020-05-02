<?php

function dep($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

function dev($data)
{
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
}

function redirect($address = false)
{
    if($address) {
        $redirect = $address;
    }else{
        $redirect = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : HOME;
    }

    header("Location: $redirect");
    exit;
}