<?php


    /* 
     * WINDOWS
     * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb2Entregable
     * http://localhost/workspace-php/004_MiPaginaWeb2Entregable/welcome.php
     * 
     * W3schools: Login Form:
     * https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form
     * 
     * 20211029
     * https://code.tutsplus.com/es/tutorials/create-a-php-login-form--cms-33261
     * 
     * 20211103
     * http://localhost/phpmyadmin/
     * root
     * password
     */  
    
     // Start session
     session_start();
     require_once 'connect.php';
     
     // echo $_SESSION['idusuario'];
     if(empty($_SESSION['idusuario'])){
         header("location: login.php");
         echo "No hay sesion";
         //exit();
     }
     else{
         echo "Si hay sesion";
     }
     
?>


<!DOCTYPE html>

<html>
<head>
    <meta charset="UFT-8">
    <title>Welcome!</title>
        <style>
        .error {
        	color: #F00
        }
        </style>
</head>

<body>    

    <h1>WELCOME!</h1>

    <p> Bienvenido al laboratorio <?php echo $_SESSION['usuario'] ?></p>
    <a href="mostrarprofile.php" target="_self">Ver perfil</a>

    <p>Ver followships <a href="followship.php">aqui</a></p>

    <p>Cierra sesion pulsando <a href="logout.php">aqui</a></p>		
    <p>Ver cookies <a href="cookie.php" target="_self">aqui</a></p>


</body>
</html>