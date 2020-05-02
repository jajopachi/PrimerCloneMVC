<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= HOME ?>">LOGOTYPE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item home">
                <a class="nav-link" href="<?= HOME ?>">Главная</a>
            </li>
            <li class="nav-item login">
                <a class="nav-link" href="/login">Авторизация</a>
            </li>
            <li class="nav-item register">
                <a class="nav-link" href="/register">Регистрация</a>
            </li>
            <li class="nav-item catalog">
                <a class="nav-link" href="/catalog">Каталог</a>
            </li>
            <li class="nav-item feedback">
                <a class="nav-link" href="/services/feedback">Обратная связь</a>
            </li>
            <li class="nav-item advertise">
                <a class="nav-link" href="/services/advertise">Реклама</a>
            </li>
            <li class="nav-item privacy-policy">
                <a class="nav-link" href="/services/privacy-policy">Пользовательское соглашение</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mr-4">
                <?php (new \app\views\currency\Currency())->run(); ?>
            </li>
            <li class="nav-item mr-4" style="cursor:pointer;">
                <svg onclick="getCart()" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     width="40" height="40"
                     viewBox="0 0 172 172"
                     style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="bold" font-size="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86.19597,14.33333c-2.35067,0 -4.55274,1.15842 -5.89291,3.09342l-32.51595,47.07324h-33.43978c-2.24317,0 -4.34927,1.04297 -5.71094,2.82747c-1.34733,1.77733 -1.80544,4.08567 -1.21777,6.24284l18.35059,66.40365c1.71283,6.192 7.3941,10.52604 13.81543,10.52604h48.52897c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-46.41536l-15.83105,-57.33333h96.736h27.75684l-2.25358,8.14649c4.80167,0.95317 9.34981,2.6006 13.54948,4.8151l5.02507,-18.21061c0.59483,-2.15717 0.14356,-4.4795 -1.20378,-6.25684c-1.36167,-1.7845 -3.47494,-2.82747 -5.71094,-2.82747h-33.38379l-32.15202,-47.04525c-1.333,-1.94933 -3.53507,-3.11425 -5.89291,-3.12142zM86.16797,34.15365l20.73014,30.34635h-41.69825zM136.16667,100.33333c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM129,114.66667h14.33333v14.33333h14.33333v14.33333h-14.33333v14.33333h-14.33333v-14.33333h-14.33333v-14.33333h14.33333z"></path></g></g></svg>
                <span class="cart-amount-qty"></span>
                <span class="cart-amount-price"></span>
            </li>
            
            <li class="nav-item">
                <a href="/services/deposit">
                    <span class="dep-text">Депозит: <span class="deposit">100000</span></span>
                </a>
            </li>

        </ul>
    </div>
</nav>