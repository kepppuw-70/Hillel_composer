<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Домашнее задание № 7</title>
   <link rel="stylesheet" type="text/css" href="css/style2.css">
   
  </head>
  <body>

<?php
require __DIR__ . '/../vendor/autoload.php';
?>

<h3>Необходимо создать в папке core класс Router</h3><br>

<h3>В Router создать метод run() который будет через var_export выдавать свойства класса.</h3><br>

<h3>Необходимо подключить в index.php используя namespace класс Router</h3><br>


<?php

$router = new liw\core\Router();
$router->setName("Piter");
$router->setage("30");
$router->run();

?>


  </body>
</html> 

