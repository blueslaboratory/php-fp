<?php


/*
 * WINDOWS
 * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb
 * http://localhost/workspace-php/004_MiPaginaWeb/logout.php
 *  
 * 20211103
 * http://localhost/phpmyadmin/
 * root
 * password
 * 1234
 */  
    
session_start();
session_destroy();

header("location: login.php")

?>

