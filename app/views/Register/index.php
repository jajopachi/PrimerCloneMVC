<div class="container col-md-12">
    <h1>Регистрация</h1>
    <hr>
    <div class="alert-danger"><?= @$errors ?></div>
    <form method="post" enctype="multipart/form-data" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">Фамилия</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Фамилия" value="<?= @$_POST['first_name'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Имя</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Имя" value="<?= @$_POST['last_name'] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="login">Логин</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Логин" value="<?= @$_POST['login'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= @$_POST['email'] ?>">
        </div>
<!--        <div class="form-group">-->
<!--            <label for="avatar">Avatar</label>-->
<!--            <input type="file" class="form-control-file" id="avatar" name="avatar">-->
<!--        </div>-->
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="remember">
                <label class="custom-control-label" for="customSwitch1">Запомнить меня!</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" id="do_register" name="do_register" value="Зарегистрироваться!">
    </form>
</div>