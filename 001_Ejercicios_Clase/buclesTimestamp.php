<!--  
8/10/2021
https://www.vicolinker.net/php-for-vs-foreach-range-while/
http://localhost/001_Ejercicios_Clase/buclesTimestamp.php



Hay que meterlo en un directorio con el Apache:
File -> New -> PHP Project -> creas el directorio en create project at existing location
F:\Xampp\htdocs\workspace-php\001_Ejercicios_Clase

creas 001_Ejercicios_Clase y luego ya lo puedes ejecutar desde:
http://localhost/workspace-php/001_Ejercicios_Clase/buclesTimestamp.php 

Enunciado: Investigar la sentencia de CTRL mas rapida para contar numeros
-->

<!DOCTYPE html>
<html lang="es">
    <head>
    	<title>Bucles benchmark</title>
    	<meta charset="utf-8">
    	
    </head>

    <body>
    	<h2>Bucles benchmark</h2>    
        <?php
        
        $start = microtime(true);
        for ($i = 0; $i < 1000000; $i++){};
        echo 'For with count: ' . (microtime(true) - $start).'s', PHP_EOL;
        //PHP_EOL: PHP End Of line
        echo "<br>";
        
        
        $start = microtime(true);
        foreach (range(0, 1000000) as $i){};
        echo 'Foreach with range: ' . (microtime(true) - $start).'s', PHP_EOL;
        echo "<br>";
        
        
        $i = 0;
        while ($i < 1000000) {
            $i++;
        }
        echo 'While: ' . (microtime(true) - $start).'s', PHP_EOL;
        echo "<br>";
        
        
        $i = 0;
        do{
            $i++;
        }while ($i < 1000000);
        echo 'Do-while: ' . (microtime(true) - $start).'s', PHP_EOL;
        echo "<br>";
        
        
        /* ejemplo while profe */
        $t1 = microtime(TRUE);
        $i = 0;
        while ($i <= 200000000) {
            $i++;
            $dummy = $i;
        }
        $t2 = microtime (TRUE);
        echo "<br>" . $dummy . ' repeticiones<br>';
        echo "bucle while terminado tiempo : " . ($t2 -$t1) . "<br>";
        
        ?>
    </body>
</html>