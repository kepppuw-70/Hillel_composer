<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Домашнее задание № 9</title>
   <link rel="stylesheet" type="text/css" href="css/style2.css">
   
  </head>
  <body>

<?php
require_once ('global.php');

require __DIR__ . '/../vendor/autoload.php';

use Core\Router;
?>

<h1>Домашнее задание № 9</h1><br>


<?php

$router = new liw\core\Router();
$router->run();

?>


  </body>
</html> 

