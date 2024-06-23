<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 
   $user = $_SESSION['user'];
   $fullname = $user['fullname'];
   // print_r($fullname);
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
            <div class="welcome-header">
               <p><b>Welcome back!</b></p>
            </div>

            <p><b>Weekly Goal</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#52FF00;width:20%"></div>
               </div>
            <p><b>Daily Goal</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#717FFF;width:80%"></div>
               </div>
            <p><b>Calories</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#FF7777;width:88%"></div>
               </div>
            <p><b>Carbs</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#FCFF7C;width:45%"></div>
               </div>
            <p><b>Protein</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#FFC452;width:76%"></div>
               </div>
            <p><b>Fat</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#8AF8FF;width:12%"></div>
               </div>
         </div>
      </body>
</html>