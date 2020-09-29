<?php
namespace liw\core;

class Router
{
    
    private $img;
   
    public function getImg() {
        return $this->tmp_name;
    }

    public function setImg($img) {
        $this->tmp_name = $img;
        return $this->tmp_name;
    }
    
    public function loodImage() {
        move_uploaded_file($this->tmp_name['image']['tmp_name'], "lood/img.jpg");
    }
    
}
