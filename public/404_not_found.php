<?php
session_start();
include 'template/template.php';
echo '<h1>404 - '.$_SESSION['path'].' - Not found</h1>';
?>
