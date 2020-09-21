<?php
namespace liw\core;

class Router
{
    

    private $name;
    private $age ;

    public function __construct()
    {
        // Обращаемся к конструктору родительского класса
        echo 'Создался экземпляр класса<br>';
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this->name;
    }

    public function getage() {
        return $this->age;
    }

    public function setage($age) {
        $this->age = $age;
        return $this->age;
    }

    public function run() {
        
        var_export($this->name);
        echo '<br>';
        var_export($this->age);
    }
}
