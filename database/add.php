<?php
   session_start();

   $table_name = $_SESSION['table'];
   $_SESSION['table'] = '';

   $username = $_POST['username'];
   $password = $_POST['password'];
   $fullname = $_POST['fullname'];
   $gender = $_POST['gender'];
   $height = floatval($_POST['height']);
   $weight = floatval($_POST['weight']);
   

   //ADD RECORD
   try{
      $command = "INSERT INTO user 
                     (username, password, fullname, gender, height, weight, created_at, updated_at)
                  VALUES
                     ('".$username."', '".$password."', '".$fullname."', '".$gender."', $height, $weight, NOW(), NOW())
                  ";
      include('connection.php');

      $response = [
         'success' => true,
         'message' => $fullname . ' successfully added.'   
      ];

      $conn->exec($command);
   } catch (PDOException $e){
      
      $response = [
         'success' => true,
         'message' => $e->getMessage()
      ];
   }
   
   $_SESSION['response'] = $response;
   header('location: ../Login.php');



?>
