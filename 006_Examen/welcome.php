<?php


if(isset($_POST['name']) &&
   isset($_POST['surname']) && 
   isset($_POST['pw']) &&
   isset($_POST['email'])){
    

    
    echo '<h1>W e l c o m e !</h1>';

    echo '<p>'.$_POST['name'].'</p><';
    echo '<p>'.$_POST['surname'].'</p>';
    echo '<p>'.$_POST['email'].'</p>';
    echo '<p>'.$_POST['sex'].'</p>';
    echo '<p>'.$_POST['colors'].'</p>';

}
?>