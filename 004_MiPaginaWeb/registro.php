<?php

    // Start the session 
    // Para guardar el id y el nombre del usuario
    
    session_start();
    include "connect.php"; 
    // necesario para poder usar la variable conn de connect.php
    
    
    /*
     * Crear la BBDD aqui:
     * http://localhost/phpmyadmin/
     * root
     * password
     *
     * Recuerda, al crear un proyecto hay que especificar la carpeta
     * donde se hace y crear el nombre de la ubicacion
     * 
     * LINUX
     * file:///var/www/html/004_MiPaginaWeb/registro.php
     * http://localhost/004_MiPaginaWeb/registro.php
     *
     * WINDOWS
     * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb
     * http://localhost/workspace-php/004_MiPaginaWeb/registro.php
     *
     * Probar a poner el siguiente name para ver que es lo que pasa
     * Name: Perry /\ <script>
     *
     *
     * TIPICA PREGUNTA DE EXAMEN:
     * Si el formulario fuese GET en vez de POST, esto no funcionaria
     */
    
    // Set session variables
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.<br>";
    
?>


<!DOCTYPE html>

<html>
<head>
    <meta charset="UFT-8">
    <title>Registro</title>
    <style>
        .error {
        	color: #F00
        }
    </style>
</head>

<body>

<?php
    
    //Establezco la cookie 20211028
    $cookie_name="usuario";
    $cookie_value="vacio";
    setcookie($cookie_name, $cookie_value, time() + (300), "/");  //300 = 5minutos
    
    //Miro si esta la cookie
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    
    
    // define variables and set to empty values
    $nameErr = $pwErr = $emailErr = $labnumberErr = "";
    $name = $pw = $email = $labnumber = "";
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        
        //Name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (! preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            } else{
                $cookie_value = $name;
                setcookie($cookie_name, $cookie_value, time() + (300), "/");  //300 = 5minutos
                //hay que hacerle el set para que se de la condicion
                
                //guardar en la variable de sesion el nombre de usuario
                $_SESSION["usuario"]= $name;
                
            }
        }
        
        
        //Password
        if (empty($_POST["pw"])) {
            $pwErr = "Password is required";
        } else {
            $pw = test_input($_POST["pw"]);
        }
        
    
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            $_SESSION["email"] = $email;
            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    
        
        // Fallo al hashear
        // $pwHash = password_hash($pw, PASSWORD_BCRYPT);
        
        //uploads 20211127
        
        $query = "INSERT INTO helpers (name, email, password, labnumber)
                                 values ('$name', '$email', '$pw', '$labnumber');";
        
        if($nameErr == "" &&
        $pwErr == "" &&
        $emailErr == "" &&
        $labnumberErr == ""){
            
            if(mysqli_query($conn, $query)){
                echo "</br>Registrado correctamente";
                
                $query = mysqli_query($conn,"SELECT * FROM helpers WHERE email = '$email'");
                $nr = mysqli_num_rows($query);
                $mostrar = mysqli_fetch_array($query);
                
                //          if (($nr == 1) && (password_verify($pw,$mostrar['password'])) ){
                if ($nr == 1){
                    $id = $mostrar['id'];
                    $directorio="uploads/".$id;
                    
                    echo "voy a crear una carpeta";
                    
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0777, true);
                        if(file_exists($directorio)){
                            $dir_carpeta_1 = $directorio ."/misfotos";
                            $dir_carpeta_2 = $directorio ."/publicaciones";
                            mkdir($dir_carpeta_1, 0777, true);
                            mkdir($dir_carpeta_2, 0777, true);
                        }
                    }
                    
                    session_start();
                    $_SESSION["idusuario"] = $id;
                    
                    header("Location: welcome.php");
                    
                }
                
                
            }
            else {
                echo "No se ha registrado al helper";
            }
        }
        
    }
    
        function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
        
        

?>
    
    
<h2>Bienvenido al registro</h2>
	<p>
		<span class="error">* required field</span>
	</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		
		Name: 
		<input type="text" name="name" value="<?php echo $name;?>"> 
		<span class="error">* <?php echo $nameErr;?></span> 
		<br><br> 
		
		Password: 
		<input type="password" name="pw">     <!-- incluyendo el value no funciona -->
		<span class="error">* <?php echo $pwErr;?></span> 
		<br><br>
		
		E-mail: 
		<input type="text" name="email" value="<?php echo $email;?>"> 
		<span class="error">* <?php echo $emailErr;?></span> 
		<br><br> 
		
		Lab number: 
		<input type="text" name="labnumber" value="<?php echo $labnumber;?>"> 
		<span class="error"><?php echo $labnumberErr;?></span> 
		<br><br> 
		
		<!-- Boton submit -->
		<input type="submit" name="submit" value="Submit">  
		
	</form>

	<a href="cookie.php" target="blank">Comprobando cookies y sesion</a>




<?php
/*
 * Para ver el input por pantalla:

    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $pw;
    echo "<br>";
    echo $labnumber;
*/
?>

</body>
</html>


