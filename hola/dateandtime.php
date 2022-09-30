<!--  
7/10/2021
https://www.w3schools.com/php/php_date.asp
http://localhost/hola/dateandtime.php

http://localhost/phpmyadmin
root
password / 1234

-->

<!DOCTYPE html>
<html lang="es">
    <head>
    	<title>Funciones de fecha y hora</title>
    	<meta charset="utf-8">
    	
    </head>

    <body>
    	<h2>Ejercicios de Fecha y Hora en PHP</h2>    
        <?php
        // https://www.w3schools.com/PHP/php_ref_string.asp
        // Si quieres manejar la fecha en espanol es a traves de la funcion que lo formatea
        // Terminal: locale -a
        setlocale(LC_TIME, 'es_ES.utf8');
        // $today = strftime("%A %d de %B de %Y");
        $today = strftime("%A %d de %B de %Y, %H:%M %Z");
        echo "Hoy es " .$today; 
        echo "<br>";
        $zona = strftime("%Z");
        echo "Zona horaria: " .$zona;
        echo "<br>";
        echo "<br>";
        
        
        //Ejercicio
        $dia_actual = date("z"); //No hay % porque es funcion numerica, no formateo
        echo "Hoy es el día número " . $dia_actual . "<br>"; 
        $bisiesto = date("L");
        $numerodias = 365;
        
        if($bisiesto = 1) {
            $numerodias = 366;
        }
        
        echo "Quedan " . ($numerodias - $dia_actual) . " días para fin de año" . "<br>";
        echo "<br>";
        echo "<br>";
        
        // https://www.w3schools.com/php/php_date.asp 
        echo "Hoy es (año/mes/día) " . date("Y/m/d") . "<br>";
        
        echo "Today is " . date("Y/m/d") . "<br>";
        echo "Today is " . date("Y.m.d") . "<br>";
        echo "Today is " . date("Y-m-d") . "<br>";
        echo "Today is (dia de la semana, dia del mes del año)" . date("l, j F Y") . "<br>";
        echo "Today is " . date("l");
        
        ?>
    </body>
</html>