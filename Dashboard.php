<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 

?>

<!DOCTYPE html>
<html>
      <head>
            <title>FA Dashboard - Fitness App</title>
            <link rel="stylesheet" href="css/style.css">
      </head>

      <body>
         <header>
            <h1>Fitness App</h1>
         </header>
      
         <?php include('partials/menubar.php') ?>

            
      </body>
</html>