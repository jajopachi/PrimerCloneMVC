<?php

namespace app\models;

class LayoutModel
{
    public static function renderCatsList()
    {
        $catsObj = new Categories();
        $categories = $catsObj->getCatsWithoutParent();
        ob_start();
        require_once VIEWS . "/parts/sidebar.php";
        echo ob_get_clean();
    }

    public static function renderBanners()
    {
        $bannerObj = new Banners();
        $banners = $bannerObj->getBanners();
        ob_start();
        require_once VIEWS . "/parts/banners.php";
        echo ob_get_clean();
    }

    public static function renderHeaderText()
    {
        $headObj = new Headers();
        $header = $headObj->getHeaderText();
        $div = "<div class='header_content text-center'><p>". $header['content'] ."</p></div>";
        echo $div;
    }

    public static function renderFooterText()
    {
        $footObj = new Headers();
        $footer = $footObj->getFooterText();
        $div = "<div class='footer_content text-center'><p>". $footer['content'] ."</p></div>";
        echo $div;
    }
}