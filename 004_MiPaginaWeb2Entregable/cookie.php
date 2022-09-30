<?php
    
    /*
     * 20211104
     * Recuerda, al crear un proyecto hay que especificar la carpeta
     * donde se hace y crear el nombre de la ubicacion
     *
     * WINDOWS
     * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb2Entregable
     * http://localhost/workspace-php/004_MiPaginaWeb2Entregable/cookie.php
     *
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
        echo "Si hay sesion" . "<br>";
        
        //establezco la cookie
        $cookie_name = "usuario"; // mismo nombre que antes
        $cookieCounter = "contador" . $_SESSION['idusuario'];
        
        if(!isset($_COOKIE[$cookie_name])) {
            echo "<br>";
            echo "La cookie '" . $cookie_name . "' no se ha guardado!<br>";
        } else {
            echo "La Cookie '" . $cookie_name . "' se ha guardado!<br>";
            echo "Su valor es: " . $_COOKIE[$cookie_name] . "<br>";
        }
                
        
        if(!isset($_COOKIE[$cookieCounter])) {
            echo "La cookie contador '" . $cookieCounter . "' no se ha guardado!<br>";
        } else {
            echo "La Cookie counter '" . $cookieCounter . "' se ha guardado!<br>";
            echo "Numero de visitas: " . $_COOKIE[$cookieCounter] . "<br>";
        }
    }
        
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Revision de cookies y sesion</title>
        <style>
            .error{
            color: red;
            }
        </style>
    </head>
    <body>

        <p>Volver a welcome <a href="welcome.php">aqui</a></p>

    </body>
</html>