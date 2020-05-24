<?php
	session_start();
   
	if(count($_POST) > 0){
        
        if($_POST['login'] == 'admin' && $_POST['password'] == 'qwerty'){
            $_SESSION['auth'] = true;
            
            if(isset($_POST['remember'])){
                setcookie('login', md5('admin'), time() + 3600 * 24 * 7);
                setcookie('password', md5('qwerty'), time() + 3600 * 24 * 7);
            }
            
            header('Location: index.php');
            exit();
        }
    }
    else{
        unset($_SESSION['auth']);
        setcookie('login', 'admin', time() - 1);
        setcookie('password', 'qwerty', time() - 1);
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