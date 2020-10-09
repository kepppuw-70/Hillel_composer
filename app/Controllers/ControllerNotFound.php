<?php

namespace App\Controllers;

class ControllerNotFound
{
    public function priceNotFound()
    {
        header('Location: 404_not_found.php');
    }

}
