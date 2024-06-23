<?php
   session_start();
   if(!isset($_SESSION['user'])) header('location: Login.php');
   

   $user = $_SESSION['user'];
   
   include('database/connection.php');

   $userlog = $user['account_id'];
   $datepicked = date('Y-m-d');
   
   $query = "
         SELECT * FROM meal
         LEFT JOIN food_list ON food_list.foodID = meal.foodID
         WHERE meal.account_ID = '$userlog' AND meal_date = '$datepicked'
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
               
               <!-- <div class="container2" id="container2">
                     <input type="date" id="datePicker" name="datePicker">
               </div> -->
               
               

               <div class="container2">
                  <a>Calories Remaining</a>
                  <a>2000</a>
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
                  <a href="#" id="breakfastLink">Breakfast</a>
               </div>
               <div class="container2">
                  <a href="#" id="lunchLink">Lunch</a>
               </div>
               <div class="container2">
                  <a href="#" id="dinnerLink">Dinner</a>
               </div>
               <div class="container2">
                  <a href="#" id="snackLink">Snack / Others</a>
               </div>                 
            </div>

            <!-- RIGHT SIDE -->


            <div class="container-mid">
               
               <div class="container2" id="container2">
                  <form id="dateForm" action="" method="POST">
                     <input type="date" id="datePicker" name="datePicker">
                  </form>   
               </div>
               <!-- <a>adasda</a> -->
               <table>
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Food Name</th>
                        <th>Meal Type</th>
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
                           <td><?= $meals['meal'] ?></td>
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
            // Get today's date in yyyy-mm-dd format
            const today = new Date().toISOString().split('T')[0];
            // Set the value of the date input to today's date
            document.getElementById('datePicker').value = today;

            // Function to handle click events and get date value
            function handleLinkClick(event) {
               event.preventDefault(); // Prevent the default link behavior
               const dateValue = document.getElementById('datePicker').value;

               // Update the href attribute of the clicked link
               const clickedLink = event.target;
               const meal = clickedLink.textContent;
               clickedLink.href = `FoodList2.php?meal=${encodeURIComponent(meal)}&date=${encodeURIComponent(dateValue)}`;
               
               // Navigate to the updated link
               window.location.href = clickedLink.href;
            }

            // Attach event listeners to the links
            document.getElementById('breakfastLink').addEventListener('click', handleLinkClick);
            document.getElementById('lunchLink').addEventListener('click', handleLinkClick);
            document.getElementById('dinnerLink').addEventListener('click', handleLinkClick);
            document.getElementById('snackLink').addEventListener('click', handleLinkClick);
            
            
 
         </script>
      </body>
</html>