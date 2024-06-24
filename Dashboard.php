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
   $carbs = 0;
   $protein = 0;
   $fat = 0;
   foreach ($meal as $meals):
      $calories += $meals['calories']+0;  // Add the calories of each meal to the total
      $carbs += $meals['Carbohydrates']+0;  // Add the calories of each meal to the total
      $protein += $meals['Protein']+0;  // Add the calories of each meal to the total
      $fat += $meals['Fat']+0;  // Add the calories of each meal to the total
        // Display the calories for each meal
   endforeach;

   $reqcalories   = 2000;
   $reqcarbs      = $reqcalories * .40;
   $reqprotein    = $reqcalories * .30;
   $reqfat        = $reqcalories * .30;

   $calories   = min((100 - (($reqcalories - $calories) /$reqcalories) *100),100);
   $carbs      = min((100 - (($reqcarbs    - $carbs)    /$reqcarbs)    *100),100);
   $protein    = min((100 - (($reqprotein  - $protein)  /$reqprotein)  *100),100);
   $fat        = min((100 - (($reqfat      - $fat)      /$reqfat)      *100),100);
   
   // echo $carbs .'<br>';
   // echo $protein .'<br>';
   // echo $fat .'<br>';

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
               <h2>Welcome back, <?php echo $user['fullname']; ?> !</h2>
            </div>

            <!-- <p><b>Weekly Goal</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color:#52FF00;width:20%"></div>
               </div> -->
            <p><b>Daily Goal</b></p>
               <div class="pbar-border">
                  <div class="pbar-fill" style="background-color: #717FFF; width: <?php echo $calories; ?>%;"></div>
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