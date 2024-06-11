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
      
         <nav>
            <a href="Dashboard.php"></i>   Home</a>
            <a href="EditProfile.php"></i> Edit Profile</a>
            <a href="database/logout.php"></i>  Logout</a>

         </nav>

            
      </body>
</html>