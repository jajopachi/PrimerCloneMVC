<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/hint.min.css">
</head>
<body onload="startTime()">

<?php if(!isset($_SESSION['user']) && !isset($_COOKIE['user'])): ?>
    <?php require_once VIEWS . "/parts/header_menu.php" ?>
<?php else: ?>
    <?php require_once VIEWS . "/parts/user_header_menu.php" ?>
<?php endif; ?>

<div class="container mt-5">
    <?php if($module !== "none"): ?>
        <div class="banners mb-4">
            <?php \app\models\LayoutModel::renderBanners() ?>
        </div>
        <div class="header">
            <?php \app\models\LayoutModel::renderHeaderText();?>
        </div>
        <div class="payment-methods">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img src="/images/qiwi.png" width="210" height="60">
                </div>
                <div class="col-md-3">
                    <img src="/images/robokassa.png" width="200" height="60">
                </div>
                <div class="col-md-3">
                    <img src="/images/webmoney.png" width="200" height="60">
                </div>
                <div class="col-md-3">
                    <img src="/images/yandex.png" width="200" height="60">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-md-3">
                <?php if($module !== "user"): ?>
                    <?php \app\models\LayoutModel::renderCatsList() ?>
                <?php else: ?>
                    <?php require_once VIEWS . "/parts/user_sidebar.php" ?>
                <?php endif; ?>
            </div>

            <div class="col-md-9">
                <?= $content ?>
            </div>
        </div>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>

    <hr>

    <footer>
        <?php \app\models\LayoutModel::renderFooterText();?>
    </footer>

    <div class="modal fade" tabindex="-1" id="cart" role="dialog" aria-labelledby="myModalLabel">
        <?php require_once VIEWS . "/Cart/cart_modal.php"; ?>
    </div>
</div>
<footer class="bg-dark p-2">
    <div class="row" style="margin-right: 0">
        <div class="col-md-3"><a href="#">О нас</a></div>
        <div class="col-md-2"><a href="#">Поддержка</a></div>
        <div class="col-md-3 text-warning text-center">
            Все права защищены <?= date("d.m.Y") ?><br><span id="curr-time"></span>
        </div>
        <div class="col-md-4 text-right">
            <span class="text-light">Магазин арендован у: </span><a href="https://t.me/dmitriyuvin" target="_blank">dmitriyuvin</a>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/currency.js"></script>
<script type="text/javascript" src="/js/cart_ajax.js"></script>
<script type="text/javascript" src="/js/active.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/loging.js"></script>
<script type="text/javascript" src="/icons/build/build-svgs.js"></script>

</body>
</html>
