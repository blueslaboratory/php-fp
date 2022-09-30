    <?php
    
        /*
         * 20211026
         * Recuerda, al crear un proyecto hay que especificar la carpeta
         * donde se hace y crear el nombre de la ubicacion
         * 
         * LINUX
         * file:///var/www/html/004_MiPaginaWeb/login.php
         * http://localhost/004_MiPaginaWeb/login.php
         * 
         * WINDOWS
         * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb
         * http://localhost/workspace-php/004_MiPaginaWeb/login.php
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
    
        
    
        //define variables and set to empty values
        $email = $pw = "";
        include 'connect.php'; //declaracion de $conn
        // no hacer sessionstart(); aqui, mejor cuando logueas a alguien
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //a la izquierda la variable del PHP, a la derecha la var del formulario
            $email = test_input($_POST["email"]);
            $pw = test_input($_POST["password"]);
            
            
            
            // https://es.stackoverflow.com/questions/166244/validar-usuario-y-contrase%C3%B1a-php?rq=1
            // require_once 'connect.php';
            // se asume conexion en $conn incluido desde conexion.php, ejemlo:
            // $conn= mysqli_connect("server", "mi_usuario", "mi_contraseña", "mi_bd");
            
            // Anadiria un limit 1 a la consulta pues solo esperamos un registro
            $sql = "SELECT * FROM helpers WHERE email = '$email'";
//          echo $sql;
            $consulta = mysqli_query ($conn, $sql);
            $nFilas = mysqli_num_rows($consulta);
            $guardarArray = mysqli_fetch_array($consulta); 
            
            
            // esto valida si la consulta se ejecuto correctamente o no
            // pero en ningun caso valida si devolvia algun registro

/*            
            if(!$consulta){
                // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " .
                echo mysqli_error($mysqli);
                // si la consulta falla es bueno evitar que el codigo se siga ejecutando
                exit;
            }
*/            
            
//          si existe alguien con ese email y el password es correcto:

/*            
            Intentando hashear: puede que no funcione porque el codigo esta en windows y 
            el servidor esta en Linux? (es solo una teoria)
            if(password_verify($pw,$guardarArray['password'])){
                echo "true";
            }
            else {
                echo "Incorrect email or password";
            }
*/
            
//          Fallo al hashear
//          if(($nFilas == 1) && (password_verify($pw,$guardarArray['password']))){

            if(($nFilas == 1) && ($pw == $guardarArray['password'])){
            
                // $_SESSION['iniciosesion'] = $user['name'];
                // Start the session cuando comprobamos que es correcto
                // echo "hola";
/*               
                echo $email;
                echo $pw;
*/              

                // cookie count visits
                $cookieCounter= "contador" . $guardarArray['id'];
                setcookie($cookieCounter, $_COOKIE[$cookieCounter] + 1, time() + 365 * 24 * 60 * 60);
                
                
                session_start();
                $_SESSION['idusuario'] = $guardarArray['id'];
    
                
                echo "</br>";
                echo "La sesion es de: "; 
                echo $_SESSION['idusuario'];
                header("Location: welcome.php");
                /*
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'welcome.php';
                header("Location: http://$host$uri/$extra");
                */
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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    
    	<h4> Welcome!</h4>
    	
        Email: <input type="text" name="email">
        <br><br>
        Password: <input type="password" name="password">
        <br><br>
        
        <input type="submit" name="submit" value="Submit">  
    </form>
    
    <p>¿No tienes cuenta? <a href="registro.php" target="blank">Registrate</a></p>
    
    
    
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