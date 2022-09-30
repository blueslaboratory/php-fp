<?php

    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', ''); // En LINUX: password 
    define('DBNAME', 'lab');
    
    $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME, '3308'); 
    //ojito con el puerto de la DB
    
    
    if (!$conn) {
        die("Ha fallado la conexion. <br/>" . mysqli_connect_error());
    }
    else echo "La conexion a la DB ha sido un exito. <br/>";

?>