<?php

namespace Core\Db;

class Connecter
{
	 private $host;
    private $database; 
    private $user;
    private $password; 

    public function setConnecter($host, $database, $user, $password) {
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    public function connecterDb()
    {   
       $link = mysqli_connect($this->host, $this->user, $this->password, $this->database) 
       or die("Ошибка " . mysqli_error($link));
 
       $query ="SELECT * FROM users";
       $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
       if($result)
       {
         echo "Выполнение запроса к базе данных прошло успешно";
       }
 
       mysqli_close($link);
    }

}
