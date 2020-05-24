<?php 

session_start();

if (isset($_POST['name'])) {
  $_SESSION['name'] = $_POST['name'];
} else {
  $_SESSION['name'] = '';
}

?>

<form method="post">
  Пожалуйста, представтесь<br>
  <input type="text" name="name"><br>
  <input type="submit" value="Войти">
</form>

<?php 
  if ($_SESSION['name'] != '') {
    echo "Здравствуйте, {$_SESSION['name']}!";
  }
?>

<a href="order.php">Перейти в чат</a>