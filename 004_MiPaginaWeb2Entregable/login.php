<?php

    /*
     * 20211026
     * Recuerda, al crear un proyecto hay que especificar la carpeta
     * donde se hace y crear el nombre de la ubicacion
     * 
     * WINDOWS
     * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb2Entregable
     * http://localhost/workspace-php/004_MiPaginaWeb2Entregable/login.php
     * 
     * https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form
     * 
     * 20211029
     * https://code.tutsplus.com/es/tutorials/create-a-php-login-form--cms-33261
     * 
     * 20211103
     * http://localhost/phpmyadmin/
     * root
     * password
     * 1234
     */
    
    $email = $pw = "";
    include 'connect.php'; //declaracion de $conn
    // no hacer sessionstart(); aqui, mejor cuando logueas a alguien
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //a la izquierda la variable del PHP, a la derecha la var del formulario
        $email = test_input($_POST["email"]);
        $pw = test_input($_POST["password"]);
        
        // Opcional: Anadir un limit de 1 a la consulta, pues solo esperamos un registro
        $sql = "SELECT * FROM helpers WHERE email = '$email'";
        // echo $sql;
        $consulta = mysqli_query ($conn, $sql);
        $nFilas = mysqli_num_rows($consulta);
        $guardarArray = mysqli_fetch_array($consulta); 
        
        
        if(($nFilas == 1) && ($pw == $guardarArray['password'])){ // comprobamos la contrasena con la DB
        
            // cookie count visits
            $cookieCounter= "contador" . $guardarArray['id'];
            setcookie($cookieCounter, $_COOKIE[$cookieCounter] + 1, time() + 365 * 24 * 60 * 60);               
            
            session_start();
            
            $_SESSION['idusuario'] = $guardarArray['id'];
            $_SESSION['usuario'] = $guardarArray['name'];
            
            $cookie_name = "usuario"; // mismo nombre que antes
            setcookie($cookie_name, $_SESSION['usuario'], time() + (24*60*60), "/");  //24*60*60 = 1 dia
            
            echo "</br>";
            echo "La sesion es de: "; 
            echo $_SESSION['idusuario'];
            header("Location: welcome.php");

            // con header voy al php del location
        } else {
            echo "<p>Usuario incorrecto o no existe.</p>";
        }
        
    }


    function test_input($data) {            
        /*
         Auto hackeo que ejecuta su propio script:
         Name: Perry /\ <script> alert ('hola amigo') </script>
         
         Para que funcione el hackeo, comentar esto:
         */
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
    
         return $data;
    }
    
    
    
?>



<!DOCTYPE html>
    
<html>
    <head>
        <meta charset="UFT-8">
        <title>Login</title>
        <style>
        .error {
            color: #F00
        }
        </style>
    </head>

    <body>

        <h1> BLUE'S LABORATORY </h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  

            <h4> Welcome!</h4>

            Email: <input type="text" name="email">
            <br><br>
            Password: <input type="password" name="password">
            <br><br>

            <input type="submit" name="submit" value="Submit">  
        </form>

        <p>¿No tienes cuenta? <a href="registro.php" target="_blank">Registrate</a></p>



        <?php
        /*
          puedo meter un php en cualquier sitio
          echo "<h2>Your Input:</h2>";
          echo $user;
          echo "<br>";
          echo $pw;
         */
        ?>

    </body>
</html>