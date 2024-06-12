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

         
         <div class="container">
            <div class="container1">
               <a href="Dashboard.php"></i>  Edit User Info</a>
            </div>
            <div class="container1">
               <a href="Meal.php"></i>       Edit Meal Info</a>
            </div>
            <div class="container1">
               <a href="Settings.php"></i>   Add New Meal</a>
            </div>
            <div class="container1">      
               <a href="Settings.php"></i>   Logout</a>
            </div>   
         </div>
         
            
      </body>
</html>