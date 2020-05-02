<h2>Welcome to your Cabinet!</h2>

<h3 style="color:blue">Glad to see you <?php echo $_SESSION['user']['token'] ?? $_COOKIE['user'] ?></h3>
<ul>
    <li>First Name: <?= $user['first_name']?></li>
    <li>Second Name: <?= $user['second_name']?></li>
    <li>Login: <?= $user['login'] ?></li>
    <li>E-mail:  <?= $user['email'] ?></li>
    <li>Created At:  <?= $user['created_at'] ?></li>
</ul>