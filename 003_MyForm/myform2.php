<!DOCTYPE html>

<html>
	<head>
		<meta charset="UFT-8">
		<title>Validacion de formulario</title>
		<style>
		  .error{color: #F00}
		</style>
	</head>
	
	<body>
		<?php
		
		/*
		 * 20211025:
		 * Myform1:
		 * https://www.w3schools.com/php/php_form_validation.asp
		 * 
		 * Myform2:
		 * https://www.w3schools.com/php/php_form_required.asp
		 * 
		 *
		 * Si pongo un comentario en HTML lo manda al cliente cuando pida
		 * la página, hay que poner los comments en PHP, en caso contrario:
		 * loading SQL inyection ...
		 *
		 * Recuerda, al crear un proyecto hay que especificar la carpeta
		 * donde se hace y crear el nombre de la ubicacion
		 * LINUX
		 * file:///var/www/html/003_MyForm/myform2.php
		 * http://localhost/003_MyForm/myform2.php
		 * 
		 * WINDOWS:
		 * F:\Xampp\htdocs\workspace-php\003_MyForm
         * http://localhost/workspace-php/003_MyForm/myform2.php
		 * 
		 * Probar a poner el siguiente name para ver que es lo que pasa
		 * Name: Perry /\ <script>
		 * 
         * TIPICA PREGUNTA DE EXAMEN:
         * Si el formulario fuese GET en vez de POST, esto no funcionaria
		 */
		
//      define variables and set to empty values
		
		
		// define variables and set to empty values
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    if (empty($_POST["name"])) {
		        $nameErr = "Name is required";
		    } else {
		        $name = test_input($_POST["name"]);
		    }
		    
		    if (empty($_POST["email"])) {
		        $emailErr = "Email is required";
		    } else {
		        $email = test_input($_POST["email"]);
		    }
		    
		    if (empty($_POST["website"])) {
		        $website = "";
		    } else {
		        $website = test_input($_POST["website"]);
		    }
		    
		    if (empty($_POST["comment"])) {
		        $comment = "";
		    } else {
		        $comment = test_input($_POST["comment"]);
		    }
		    
		    if (empty($_POST["gender"])) {
		        $genderErr = "Gender is required";
		    } else {
		        $gender = test_input($_POST["gender"]);
		    }
		}
				
		
        
        function test_input($data) {
            
          /*
          Auto hackeo que ejecuta su propio script:
          Name: Perry /\ <script> alert ('hola amigo') </script>
          
          comentar esto:
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          */
            
//        Me autohackeo si comento esto:    
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
          
        }
        ?>
        
        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field</span></p>
        
        
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          Name: <input type="text" name="name">
          <span class="error">* <?php echo $nameErr;?></span>
          <br><br>
          
          E-mail: <input type="text" name="email">
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>
          
          Website: <input type="text" name="website">
          
          <br><br>
          
          Comment: <br><textarea name="comment" rows="5" cols="40"></textarea>
          
          <br><br>
          
          Gender:
          <input type="radio" name="gender" value="female">Female
          <input type="radio" name="gender" value="male">Male
          <input type="radio" name="gender" value="other">Other
          <span class="error">* <?php echo $genderErr;?></span>
          <br><br>
          
          <input type="submit" name="submit" value="Submit">
            
        </form>
        
        <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        ?>
        		
		
		
		
	
	</body>
</html>