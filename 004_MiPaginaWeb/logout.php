    <?php
    
    
        /*
         * 20211104
         * Recuerda, al crear un proyecto hay que especificar la carpeta
         * donde se hace y crear el nombre de la ubicacion
         *
         * LINUX
         * file:///var/www/html/004_MiPaginaWeb/logout.php
         * http://localhost/004_MiPaginaWeb/logout.php
         * 
         * WINDOWS
         * F:\Xampp\htdocs\workspace-php\004_MiPaginaWeb
         * http://localhost/workspace-php/004_MiPaginaWeb/logout.php
         * 
         * 
         * https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form
         * 
         * 
         * 20211029
         * https://code.tutsplus.com/es/tutorials/create-a-php-login-form--cms-33261
         * 
         * 20211103
         * http://localhost/phpmyadmin/
         * root
         * password
         */  
        
    session_start();
    session_destroy();
    
    header("location: login.php")
    
    ?>
    
    
    