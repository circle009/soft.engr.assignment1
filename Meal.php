<?php
   session_start();
   if(!isset($_SESSION['user'])) header('location: Login.php');
   

   $user = $_SESSION['user'];
   
   include('database/connection.php');

   $userlog = $user['account_id'];
   

   
   $query = "
        SELECT * FROM meal
        LEFT JOIN food_list ON  food_list.foodID = meal.foodID
        WHERE meal.account_ID = $userlog 
        ";

   $stmt = $conn->prepare($query);
   $stmt->execute();
   $meal = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $_SESSION['foodlist'] = $meal;

   
  

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
            <div class="container-side">
               <form method="POST" id="dateForm">
                  <div class="container2" id="container2">
                     <input type="date" id="datePicker" name="datePicker">
                     <!-- <input type="text" id="datePicker2" name="datePicker2"> -->
                     
                  </div>
               </form>
               

               <div class="container2">
                  <a>Calories Remaining</a>
                  <a>Calories Remaining</a>
                  <a><br></a>
                  <a>Calories Consumed</a>
                  <a>
                  <?php
                     $total = 0;  // Initialize total to 0
                     foreach ($meal as $meals):
                        $total += $meals['calories']+0;  // Add the calories of each meal to the total
                          // Display the calories for each meal
                     endforeach;
                     echo $total;
                     ?>
                     
                  </a>            
               </div>
               <div class="container2">
                  <a href="FoodList.php"> Breakfast</a>
               </div>
               <div class="container2">      
                  <a href="FoodList.php"> Lunch</a>
               </div> 
               <div class="container2">      
                  <a href="FoodList.php"> Dinner</a>
               </div>   
               <div class="container2">      
                  <a href="FoodList.php"> Snack / Others</a>
               </div>            
            </div>
            <div class="container-mid">
               <a>adasda</a>
               <table>
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Food Name</th>
                        <th>Calories</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                              $counter = 1; // Initialize the counter
                              foreach ($meal as $meals):
                     ?>
                        <tr>
                           <td><?= $counter ?></td>
                           <td><?= $meals['food'] ?></td>
                           <td><?= $meals['calories'] ?></td>
                        </tr>
                     <?php $counter++; // Increment the counter
                        endforeach;
                     ?>
                  </tbody>
               </table>
            </div>

         </div>
         

         <script>
            function getTodayDate() {
               var today = new Date();
               var year = today.getFullYear();
               var month = ('0' + (today.getMonth() + 1)).slice(-2);
               var day = ('0' + today.getDate()).slice(-2);
               return year + '-' + month + '-' + day;
            }

            // Set initial value of the date picker to today's date
            document.addEventListener("DOMContentLoaded", function() {
                  var datePicker = document.getElementById("datePicker");
                  datePicker.value = getTodayDate();
                  document.getElementById("datePicker2").value = getTodayDate();

                  // Add event listener to copy the value when the date is changed
                  datePicker.addEventListener("change", function() {
                     var selectedDate = datePicker.value;
                     document.getElementById("datePicker2").value = selectedDate;
                  });

                  // Optional: Handle click on the container to focus the date picker
                  document.getElementById("container2").addEventListener("click", function() {
                     datePicker.focus(); // Automatically focus the date picker
                  });
            });

            
         </script>
      </body>
</html>