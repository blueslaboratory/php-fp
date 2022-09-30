<?php

    // Start the session 
    // Para guardar el id y el nombre del usuario
    
    session_start(); 
    // necesario para poder usar la variable conn de connect.php
    
    
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

    // http://localhost/006_Examen/registro.php
    
    
    //Establezco la cookie 20211028
    $cookie_sn="usuario";
    $cookie_value="vacio";
    setcookie($cookie_sn, $cookie_value, time() + (300), "/");  //300 = 5minutos
    
    //Miro si esta la cookie
    if(!isset($_COOKIE[$cookie_sn])) {
        echo "Cookie named '" . $cookie_sn . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_sn . "' is set!</br>";
        echo "Value is: " . $_COOKIE[$cookie_sn];
    }
    
    
    // define variables and set to empty values
    $nameErr = $snErr = $pwErr = $emailErr = $sexErr = $colorsErr = "";
    $name = $surname = $pw = $email = $sex = $colors = "";
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        
        //Name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (! preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            } 
        }
        
        //SurName
        if (empty($_POST["surname"])) {
            $snErr = "Surname is required";
        } else {
            $surname = test_input($_POST["surname"]);
            // check if name only contains letters and whitespace
            if (! preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
                $snErr = "Only letters and white space allowed";
            } else{
                $cookie_value = $surname;
                setcookie($cookie_sn, $cookie_value, time() + (300), "/");  //300 = 5minutos
                //hay que hacerle el set para que se de la condicion
                
            }
        }
        
        
        //email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            $_SESSION["email"] = $email;
            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else{
                //guardar en la variable de sesion el correo
                $_SESSION["email"]= $email;
                
            }
        }
        
        
        //Password
        if (empty($_POST["pw"])) {
            $pwErr = "Password is required";
        } else {
            $pw = test_input($_POST["pw"]);
        }
        
 
        //Sex
        if (empty($_POST["sex"])) {
            $sex = "No declarado";
        } else {
            $sex = test_input($_POST["sex"]);
        }
    
        
        //Colors
        $colors = test_input($_POST["colors"]);
        
        
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
<!--<form method="post" action="<?php  // echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  -->	
	<form method="post" action="welcome.php">
		
		Name:
		<input type="text" name="name" value="<?php echo $name;?>"> 
		<span class="error">* <?php echo $nameErr;?></span> 
		<br><br> 
		
		Surname:
		<input type="text" name="surname" value="<?php echo $surname;?>"> 
		<span class="error">* <?php echo $snErr;?></span> 
		<br><br> 
		
		E-mail: 
		<input type="text" name="email" value="<?php echo $email;?>"> 
		<span class="error">* <?php echo $emailErr;?></span> 
		<br><br> 
		
		Password: 
		<input type="password" name="pw" minlength="6" maxlength="12">
		<span class="error">* <?php echo $pwErr;?></span> 
		<br><br>
		
		Sexo:
		<input type="radio" name="sex" value="M">Masculino
		<input type="radio" name="sex" value="F">Femenino
		<input type="radio" name="sex" value="U">Undefined
		<br><br> 		
		
		Colores favoritos: 
		<br> 
		<input type="checkbox" name="colors" value="red">Red  
		<input type="checkbox" name="colors" value="green">Green 
		<input type="checkbox" name="colors" value="blue">Blue 
		<br><br> 
		
		<!-- Boton submit -->
		<input type="submit" name="submit" value="Submit">  
		
	</form>

	<a href="cookie.php" target="blank">Comprobando cookies y sesion</a>



</body>
</html>


