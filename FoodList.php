<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 

   // $user = $_SESSION['user'];
   
   include('database/connection.php');

   $query = "
        SELECT * FROM food_list";

   $stmt = $conn->prepare($query);
   $stmt->execute();
   $foodlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $_SESSION['foodlist'] = $foodlist;


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
            
            <div class="container-mid">
               
               
               <!-- <label for="">Search</label> -->
               <input type="text" placeholder="Search"  name="username"/>
               

               <table>
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Food Name</th>
                        <th>Serving Size</th>
                        <th>Calories</th>
                        <th>Carbs</th>
                        <th>Proteins</th>
                        <th>Fats</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                              $counter = 1; // Initialize the counter
                              foreach ($foodlist as $foodlists):
                     ?>
                        <tr>
                           <td><?= $counter ?></td>
                           <td><?= $foodlists['food'] ?></td>
                           <td><?= $foodlists['servingSize'] ?></td>
                           <td><?= $foodlists['calories'] ?></td>
                           <td><?= $foodlists['Carbohydrates'] ?></td>
                           <td><?= $foodlists['Protein'] ?></td>
                           <td><?= $foodlists['Fat'] ?></td>
                        </tr>
                     <?php $counter++; // Increment the counter
                        endforeach;
                     ?>
                  </tbody>
               </table>
            </div>

         </div>
         


      </body>
</html>