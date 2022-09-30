<?php
    session_start();
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
        
        <?php
        
            /*
             * 20211028
             * Este archivo funciona a la par con myform5Cookie
             * Recuerda, al crear un proyecto hay que especificar la carpeta
             * donde se hace y crear el nombre de la ubicacion
             * LINUX
             * file:///var/www/html/003_MyForm/myform6Cookie.php
             * http://localhost/003_MyForm/myform6Cookie.php
             * WINDOWS:
		     * F:\Xampp\htdocs\workspace-php\003_MyForm
             * http://localhost/workspace-php/003_MyForm/myform6Cookie.php
             *
             */
        
            
            //establezco la cookie
            $cookie_name = "usuario"; // mismo nombre que antes
            $cookie_value = "Alejandro";
            
            
            if(!isset($_COOKIE[$cookie_name])) {
                echo "La cookie '" . $cookie_name . "' no se ha guardado!<br>";
            } else {
                echo "La Cookie '" . $cookie_name . "' se ha guardado!<br>";
                echo "Su valor es: " . $_COOKIE[$cookie_name] . "<br>";
            }
            
            // Echo session variables that were set on previous page
            echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
            echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
        
        ?>
    

	</body>
</html>