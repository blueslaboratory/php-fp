<?php
 
define('DBHOST','localhost');   /*cambia para cada base*/
define('DBUSER','root');     /*cambia para cada base*/
define('DBPASS','');        /*cambia para cada base*/
define('DBNAME','sakila');      /*cambia para cada base*/

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, '3308');


if(!$conn){
    die("Ha fallado la conexion: " . myqli_connect_error() . "<br/><br/>");
}

else echo "La conexion ha sido un exito <br/><br/>";

/*
 * Si pongo un comentario en HTML lo manda al cliente cuando pida
 * la página, poner comments en PHP, en caso contrario:
 * loading SQL inyection ...
 * 
 * Recuerda, al crear un proyecto hay que especificar la carpeta
 * donde se hace y crear el nombre de la ubicacion
 * LINUX:
 * file:///var/www/html/002_Connect/connect.php
 * http://localhost/002_Connect/connect.php
 * 
 * WINDOWS
 * F:\Xampp\htdocs\workspace-php\002_Connect
 * http://localhost/workspace-php/002_Connect/connect.php
 */

?>

