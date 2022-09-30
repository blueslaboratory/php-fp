<!DOCTYPE html>

<html>
    <head>
        <meta charset="UFT-8">
        <title>Modify Profile</title>
        <style>
            .error {
                color: #F00
            }
        </style>
    </head>

    <body>

        <h3>Perfil actual: </h3>

        <?php
        /*
          20211112
          https://tryphp.w3schools.com/showphpfile.php?filename=demo_db_select_oo
        */
        //  Start session
        // Start session
        session_start();
        require_once 'connect.php';
        // TIENE QUE SER REQUIRE_ONCE NO VALE INCLUDED!!
        // echo $_SESSION['idusuario'];
        if (empty($_SESSION['idusuario'])) {
            header("location: login.php");
            echo "No hay sesion";
            //exit();
        } else {
            echo "Si hay sesion" . "<br>";

            $id = $_SESSION['idusuario'];
            $consulta = "SELECT * FROM Helpers WHERE id = '$id'";


            $consulta1 = mysqli_query($conn, $consulta);
            $guardarArray = mysqli_fetch_assoc($consulta1);
            $nFilas = mysqli_num_rows($consulta1);


            echo "Nombre: " . $guardarArray['name'] . "<br/>";
            echo "Email: " . $guardarArray["email"] . "<br/>";
            echo "Lab number: " . $guardarArray["labnumber"] . "<br/>";

            $sql = "SELECT Helpers.name, Aficiones.aficion 
                FROM lab.Helpers, lab.Aficiones, lab.AficionesDeUsuario
                WHERE Helpers.id = AficionesDeUsuario.idUsuarios
                AND Aficiones.id = AficionesDeUsuario.idAficiones
                AND Helpers.id = 1";

            //  echo $_SESSION['iniciosesion'];

            $sql2 = "SELECT h.name as nombre, a.aficion as aficion
                 FROM Helpers h, Aficiones a, AficionesDeUsuario adu
                 WHERE h.name = 
              '" . $guardarArray['name'] . "'
                 AND h.id = adu.idUsuarios
                 AND adu.idAficiones = a.id;";


            /*
              Hay que meter la comilla simple dentro del string

              sql2:
              http://localhost/phpmyadmin/tbl_sql.php?db=lab&table=Helpers#

              SELECT h.name, a.aficion
              FROM Helpers h, Aficiones a, AficionesDeUsuario adu
              WHERE h.name = name
              AND h.id = adu.idUsuarios
              AND adu.idAficiones = a.id;
             */

            //  echo $sql2 ;

            $result = $conn->query($sql2);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "Hola " .  $_SESSION['idusuario'] . "</br>";
                
                while ($row = $result->fetch_assoc()) {
                    // echo "Hola " . $_SESSION['idusuario'];
                    echo " - Name: " . $row["nombre"] . " - Aficion - " . $row["aficion"] . "<br>";
                }
            } else {
                echo "0 results";
            }



            // define variables and set to empty values
            $nameErr = $emailErr = $labnumberErr = "";
            $name = $email = $labnumber = "";

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // Profile picture (pfp)
            // variable con la ruta entera y sabiendo que existe
            $target_file = "uploads/" . $id . "/misfotos/pfp";
            if (file_exists($target_file . ".jpeg")) {
                $rutaPfp = $target_file . ".jpeg";
            } else if (file_exists($target_file . ".jpg")) {
                $rutaPfp = $target_file . ".jpg";
            } else if (file_exists($target_file . ".png")) {
                $rutaPfp = $target_file . ".png";
            } else if (file_exists($target_file . ".gif")) {
                $rutaPfp = $target_file . ".gif";
            } else {
                echo "</br>";
                echo "no se ha encontrado la foto de perfil";
                $rutaPfp = "sin ruta";
            }




            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //Name
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                        $nameErr = "Only letters and white space allowed";
                    } else {
                        $cookie_value = $name;
                        $cookie_name = "usuario";
                        setcookie($cookie_name, $cookie_value, time() + (900), "/");  //900 = 15minutos
                        //hay que hacerle el set para que se de la condicion
                        //guardar en la variable de sesion el nombre de usuario
                        $_SESSION["usuario"] = $name;
                    }
                }


                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    $_SESSION["email"] = $email;
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }


                //Lab Number
                if (!empty($_POST["labnumber"])) {
                    $labnumber = test_input($_POST["labnumber"]);
                    $_SESSION["labnumber"] = $labnumber;
                    if (!is_numeric($labnumber)) {
                        $labnumberErr = "Must be a number!";
                    }
                }



                //UPDATE
                $query = "UPDATE Helpers SET name = '$name', "
                                         . "email = '$email', "
                                         . "labnumber = '$labnumber' "
                                         . "WHERE id = '$id'";

                if ($nameErr == "" && $emailErr == "" && $labnumberErr == "") {
                    echo "Hola soy el antes del header";
                    if (mysqli_query($conn, $query)) {
                        header("Location: welcome.php");
                    } else {
                        echo "</br>";
                        echo "Error al actualizar";
                    }
                }
            }
        }
        ?>


        <br/>
        <br/>
        Volver a welcome <a href="welcome.php">aqui</a>
        <br/>
        <a href="logout.php" >Logout</a>

        <br/>
        <br/>
        <br/>

        <h3>Cambiar perfil: </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


            Name: 
            <input type="text" name="name" value="<?php echo $guardarArray['name']; ?>"> 
            <span class="error">* <?php echo $nameErr; ?></span> 
            <br><br> 

            <!-- ojo, sin comillas dobles -->
            Pfp:
            <br>
            <img src=<?php echo $rutaPfp; ?> alt="pfp not found" width="250">   
            <p>Editar foto de perfil <a href="pfp.php" target="blank">aqui</a></p>
            <br><br>

            E-mail: 
            <input type="text" name="email" value="<?php echo $guardarArray['email']; ?>"> 
            <span class="error">* <?php echo $emailErr; ?></span> 
            <br><br> 

            Lab number: 
            <input type="text" name="labnumber" value="<?php echo $guardarArray['labnumber']; ?>"> 
            <span class="error">*<?php echo $labnumberErr; ?></span> 
            <br><br>		

            <!-- Boton submit -->
            <input type="submit" name="submit" value="Submit">  

        </form>



    </body>
</html>