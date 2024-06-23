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

   $calories = 0;
   foreach ($meal as $meals):
      $total += $meals['calories']+0;  // Add the calories of each meal to the total
        // Display the calories for each meal
   endforeach;
   echo $calories;

   $carbs = 80;
   $protein = 80;
   $fat = 80;
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
                  <div class="pbar-fill" style="background-color: #717FFF; width: <?php echo $percentage; ?>%;"></div>
               </div>
            <p><b>Calories</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color: #FF7777; width: <?php echo $calories; ?>%;"></div>
               </div>
            <p><b>Carbs</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color: #FCFF7C; width: <?php echo $carbs; ?>%;"></div>
               </div>
            <p><b>Protein</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color: #FFC452; width: <?php echo $protein; ?>%;"></div>
               </div>
            <p><b>Fat</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#8AF8FF; width: <?php echo $fat; ?>%;"></div>
               </div>
         </div>
      </body>
</html>