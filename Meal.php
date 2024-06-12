<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 

?>

<!DOCTYPE html>
<html>
      <head>
            <title>FA Meal - Fitness App</title>
            <link rel="stylesheet" href="css/style.css">
      </head>

      <body>
         <header>
            <h1>Fitness App</h1>
         </header>
      
         <?php include('partials/menubar.php') ?>

         <div class="container">
            <div class="container2">
               <a href=""></i>  Today</a>
            </div>
            <div class="container2">
               <a href=""></i>   Calories Remaining</a>
               <a><br></a>
               <a href=""></i>   Calories Consumed</a>
               
            </div>
            <div class="container2">
               <a href=""></i>   Breakfast</a>
            </div>
            <div class="container2">      
               <a href=""></i>   Lunch</a>
            </div> 
            <div class="container2">      
               <a href=""></i>   Dinner</a>
            </div>   
            <div class="container2">      
               <a href=""></i>   Snack / Others</a>
            </div>   
                 
         </div>


      </body>
</html>