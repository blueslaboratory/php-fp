<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda</title>
    </head>
    <body>
        <h2>Formulario de registro</h2>

        <?php
        /*
         * Recuerda, al crear un proyecto hay que especificar la carpeta
         * donde se hace y crear el nombre de la ubicacion
         * LINUX
         * file:///var/www/html/002_Connect/registro.php
         * http://localhost/002_Connect/registro.php
         * 
         * WINDOWS
         * F:\Xampp\htdocs\workspace-php\002_Connect
         * http://localhost/workspace-php/002_Connect/registro.php
         */

        echo "Introduzca un nombre de usuario y una contrasena";
        ?>

        <form action="inicio.php"  method="post">
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" value=""><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" value=""><br><br>
            <input type="submit" value="Submit">
        </form> 

        <!-- 
        20211022
        https://www.w3schools.com/php/php_form_validation.asp
        -->


    </body>
</html>
