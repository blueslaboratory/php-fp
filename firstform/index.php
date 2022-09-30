<!-- 
1/10/2021



en el navegador poner:
localhost/firstform 

https://www.w3schools.com/php/php_forms.asp
https://www.w3schools.com/php/php_arrays.asp


Adicional:
https://code.tutsplus.com/tutorials/http-headers-for-dummies--net-8039
https://en.wikipedia.org/wiki/List_of_HTTP_status_codes



Seguridad:
Think SECURITY when processing PHP forms!

This page does not contain any form validation, it just 
shows how you can send and retrieve form data.

However, the next pages will show how to process PHP forms 
with security in mind! Proper validation of form data is 
important to protect your form from hackers and spammers!


When to use GET?
Information sent from a form with the GET method is visible 
to everyone (all variable names and values are displayed 
in the URL). 
GET also has limits on the amount of information to send. 
The limitation is about 2000 characters. However, because 
the variables are displayed in the URL, it is possible to 
bookmark the page. This can be useful in some cases.

GET may be used for sending non-sensitive data.

Note: GET should NEVER be used for sending passwords or other 
sensitive information!

-->

<!DOCTYPE HTML>


<html>
    <head>
 	   <title>Mi primer formulario</title>
    </head>
    
    <body>
    
     
    <!-- 
    method: get 
    <form action="hola.php" method="get">
    
    El metodo post es mas apropiado por temas de privacidad
    -->
    
        <form action="hola.php" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit">
        </form>
    
    </body>
</html> 