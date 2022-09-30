<!--  
8/10/2021
https://www.vicolinker.net/php-for-vs-foreach-range-while/
LINUX:
http://localhost/001_Ejercicios_Clase/buclesTimestamp.php



Hay que meterlo en un directorio con el Apache:
File -> New -> PHP Project -> creas el directorio en create project at existing location
F:\Xampp\htdocs\workspace-php\001_Ejercicios_Clase

creas 001_Ejercicios_Clase y luego ya lo puedes ejecutar desde:
WINDOWS
http://localhost/workspace-php/001_Ejercicios_Clase/buclesTimestamp2.php
 
Enunciado: Investigar la sentencia de CTRL mas rapida para contar numeros
-->

<!DOCTYPE html>
<html lang="es">
    <head>
    	<title>Bucles benchmark Timestamp</title>
    	<meta charset="utf-8">
    	
    </head>

    <body>
    	<h2>Bucles benchmark</h2>    
        <?php
        
        
        $now = strftime("%S");
        for ($i = 0; $i < 1000000; $i++){};
        $later = strftime("%S");
        echo 'For with count: ' . ($later - $now) . 's', PHP_EOL; 
        echo "<br>";
        
        
        $now = strftime("%S");
        foreach (range(0, 1000000) as $i){};
        $later = strftime("%S");
        echo 'Foreach with range: ' . ($later - $now) . 's', PHP_EOL;
        echo "<br>";
        
        
        $i = 0;
        $now = strftime("%S");
        while ($i < 1000000) {
            $i++;
        }
        $later = strftime("%S");
        echo 'While: ' . ($later - $now) . 's', PHP_EOL;
        echo "<br>";
        
        
        $i = 0;
        $now = strftime("%S");
        do{
            $i++;
        }while ($i < 1000000);
        $later = strftime("%S");
        echo 'Do-while: ' . ($later - $now).'s', PHP_EOL;
        echo "<br>";
        
        ?>
    </body>
</html>