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

         <div class="container-summary">
            <p>Welcome back!</p>

            <div class="pbar-border">
               <div class="pbar-fill" style="width:20%"></div>
            </div>
            <div class="pbar-border">
               <div class="pbar-fill" style="width:20%"></div>
            </div>
         </div>
      </body>
</html>