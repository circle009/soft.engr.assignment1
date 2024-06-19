<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: Login.php');
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header('Location: Login.php'); // Redirect to login page after logout
    exit();
}
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


         <div class="container-settings">
            <div class="container1">
               <a href="updateuserinfo.php"></i>  Edit User Info</a>
            </div>
            <div class="container1">
               <a href="FoodList-update.php"></i>       Edit Meal Info</a>
            </div>
            <div class="container1">
               <a href="addnewmeal.php"></i>   Add New Meal</a>
            </div>
            <div class="container1">
            <!-- Logout Form -->
            <!-- <form action="database/logout.php" method="POST"> -->
              
               <a href="database/logout.php"></i>   Logout</a>
            
            <!-- <button type="submit" name="logout">Logout</button> -->
            <!-- </form> -->
        </div> 
         </div>
         
            
      </body>
</html>