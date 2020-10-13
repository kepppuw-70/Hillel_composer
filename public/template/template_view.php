
<?php

$view = [
    
    '/registration' => 'registration.php',
    '/about'        => 'about.php',
    '/contact'      => 'contact.php',
    '/documents'    => 'documents.php',
    '/price'        => 'price.php',
];

if (isset($view[$_SERVER['REQUEST_URI']])) {
    include $view[$_SERVER['REQUEST_URI']];
} else {
    include '404_not_found.php';
}

?>