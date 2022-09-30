<?php

// Start session
session_start();
require_once 'connect.php';

// echo $_SESSION['idusuario'];
if(empty($_SESSION['idusuario'])){
    header("location: login.php");
    echo "No hay sesion";
    //exit();
}
else{
    echo "Si hay sesion" . "<br>";
    echo "(SIN TERMINAR) - Selecciona a quien quieras seguir - (SIN TERMINAR)" . "<br><br>";
    
    $query = "SELECT id , email, name FROM helpers";
    
    $result = $conn->query($query) or die("error: ".$query);
    $results = array();
    
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
        }
        foreach ($results as $result){
            echo "* ID: ";
            print_r($result['id']);
            echo "<br>";
            echo "Email: ";
            print_r($result['email']);
            echo "<br>";
            echo "Name: ";
            print_r($result['name']);
            echo "<br>";            
        }
        
    }
    else {
        echo "0 results";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Home</title>
    
    <style>
</style>
</head>

<body>
	<p>Volver a welcome <a href="welcome.php">aqui</a></p>
</body>

</html>
