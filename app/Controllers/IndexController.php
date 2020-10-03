<?php
namespace liw\app\Controllers;

class IndexController
{
    
     public function __construct()
    {
       echo 'Создался экземпляр класса IndexController<br>';
       
    }

    public function indexAction() 
    {
    	echo 'Hello world';
    }

}

?>