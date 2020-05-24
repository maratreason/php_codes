<?php
	session_start();

    if (count($_POST) > 0) {
        if ($_POST['login'] == 'admin' && $_POST['password'] == 'qwerty') {
            $_SESSION['auth'] = true;

            // чтобы оставаться на сайте нужны cookie. login, pass 
            // галочка Запомнить

            header('Location: a.php');
            exit();
        }
    } else {
        unset($_SESSION['auth']);
    }
?>
<form method="post">
	Логин<br>
	<input type="text" name="login"><br>
	Пароль<br>
	<input type="text" name="password"><br>
	<input type="checkbox" name="remember">Запомнить меня
	<input type="submit" value="Войти">
</form>