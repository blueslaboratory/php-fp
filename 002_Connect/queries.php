<!-- 20211021 -->


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>
    <body>

        <?php
        require_once 'connect.php';
        /*
          Para crear la tabla en sakila necesito haber ejecutado:
          CREATE TABLE `sakila`.`usuarios` (
          `idusuario` INT NOT NULL AUTO_INCREMENT,
          `usuario` VARCHAR(45) NOT NULL,
          `password` VARCHAR(45) NOT NULL,
          `email` VARCHAR(60) NOT NULL,
          PRIMARY KEY (`idusuario`),
          UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC)) VISIBLE);

         */


        /*
         * Si pongo un comentario en HTML lo manda al cliente cuando pida
         * la pagina, poner comments en PHP, en caso contrario:
         * loading SQL inyection ...
         *
         * Recuerda, al crear un proyecto hay que especificar la carpeta
         * donde se hace y crear el nombre de la ubicacion
         * 
         * LINUX
         * file:///var/www/html/002_Connect/queries.php
         * http://localhost/002_Connect/queries.php
         *  
         * WINDOWS
         * F:\Xampp\htdocs\workspace-php\002_Connect
         * http://localhost/workspace-php/002_Connect/queries.php
         */


        echo "Su nuevo usuario es" . $_POST["usuario"] . "<br/>";
        echo "Su nueva contrasena es" . $_POST["pwd"] . "<br/>";

        $sql = "INSERT INTO usuarios (usuario, password, email) VALUES ('" . $_POST["usuario"] . "', '" . $_POST["pwd"] . "', 'john@example.com')";
        echo "Query: " . $sql . "<br/>";
        if (mysqli_query($conn, $sql)) {
            echo "Usuario creado con exito.<br/>";
        } else {
            echo "Error: " . $sql . "<br/>" . mysqli_error($conn) . "<br/>";
        }


        $sql = "SELECT actor_id AS id_act, first_name, last_name FROM actor ORDER BY last_name LIMIT 10 ";

        $result = mysqli_query($conn, $sql);



        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id_act"] . " - Nombre: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            }
        } else {
            echo "No hay resultados";
        }
        ?>

    </body>
</html>