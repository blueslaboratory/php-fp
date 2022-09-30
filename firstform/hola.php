<!-- 
1/10/2021

en el navegador poner:
localhost/firstform 
http://localhost/firstform/hola.php

https://www.w3schools.com/php/php_forms.asp
https://www.w3schools.com/php/php_arrays.asp


Hay que meterlo en un directorio con el Apache:
File -> New -> PHP Project -> creas el directorio en create project at existing location
LINUX:      file:///var/www/html/firstform
WINDOWS:    F:\Xampp\htdocs\workspace-php
creas firstform y luego ya lo puedes ejecutar desde:
LINUX:      http://localhost/firstform/hola.php
WINDOWS:    http://localhost/workspace-php/firstform/hola.php
-->


<!DOCTYPE HTML>


<html>

    <head>
   		<title>Mi primer formulario</title>
    </head>
    
    <body>
        <!-- 
        method: get
        Bienvenido: <?php echo $_GET["name"]; ?><br> 
        Su correo es: <?php echo $_GET["email"]; ?>
        -->
        
        Bienvenido: <?php echo $_POST["name"]; ?><br> 
        Su correo es: <?php echo $_POST["email"]; ?><br><br>
        
        
        <!-- arrays con puntos (concatenadores) y sin puntos -->
         <?php
            $cars = array("Volvo", "BMW", "Toyota");
            echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
        ?>
        <br>
        <?php
            echo "I like $cars[0], $cars[1] and $cars[2].";
        ?> 
    </body>

</html>