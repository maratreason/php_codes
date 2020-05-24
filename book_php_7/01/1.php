<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h1>Hello</h1>
  <p>
    <?php 
      $dat = date("d.m y");

      $tm = date("h:i:s");

      echo "Текущая дата: $dat года<br />";
      echo "Текущее время: $tm<br />";

      echo "А вот квадраты и кубы первых 5 натуральных чисел: <br>";
      echo "<ul>\n";
      for ($i = 1; $i <= 5; $i++) {
        echo "<li>$i в квадрате " . ($i * $i) . "</li>";
        echo "<li>$i в кубе " . ($i * $i * $i) . "</li>";
      }

    ?>
  </ul>
  </p>
</body>
</html>