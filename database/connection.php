<?php
   $servername = 'localhost';
   $username = 'root';
   $password = '';

   //DATABASE CONNECTION
   try{
      $conn = new PDO("mysql:host=$servername;dbname=fitness_app", $username, $password);
      // SET PDO ERROR MODE TO EXCEPTION
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
   }catch (\Exception $e){
      $error_message =  $e->getMessage();
   }

?>