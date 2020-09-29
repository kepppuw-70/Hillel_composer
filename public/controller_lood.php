<?php
require __DIR__ . '/../vendor/autoload.php';
$router = new liw\core\Router();
$router->setImg($_FILES);
$router->loodImage();
include 'view_img.php';
?>


