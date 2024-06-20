<?php
   session_start();
   $user = $_SESSION['user'];

   function getParam($name) {
      return isset($_GET[$name]) ? htmlspecialchars(trim($_GET[$name])) : '';
   }
   
   $account = $user['account_id'];
   $ADDfood =        getParam('ADDfood');
   $ADDservingsize = getParam('ADDservingsize');
   $ADDcalories =    getParam('ADDcalories');
   $ADDcarbs =       getParam('ADDcarbs');
   $ADDprotein =     getParam('ADDprotein');
   $ADDfat =         getParam('ADDfat');
   $ADDmeal =        getParam('ADDmeal');
   $ADDdate =        getParam('ADDdate');

   // print_r($account); print_r('<br>');
   // print_r($ADDfood); print_r('<br>');
   // print_r($ADDservingsize); print_r('<br>');
   // print_r($ADDcalories); print_r('<br>');
   // print_r($ADDcarbs); print_r('<br>');
   // print_r($ADDprotein); print_r('<br>');
   // print_r($ADDfat); print_r('<br>');
   // print_r($ADDmeal); print_r('<br>');
   // print_r($ADDdate); print_r('<br>');
   

   //ADD RECORD
   // try{
      include('connection.php');
      $command = "
    INSERT INTO meal (account_ID, foodID, meal, meal_date)
    VALUES (
        :account_ID,
        (SELECT foodID FROM food_list WHERE food = :ADDfood),
        :ADDmeal,
        :ADDdate
    )
";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($command);

    // Bind parameters
    $stmt->bindValue(':account_ID', $account, PDO::PARAM_STR);
    $stmt->bindValue(':ADDfood', $ADDfood, PDO::PARAM_STR);
    $stmt->bindValue(':ADDmeal', $ADDmeal, PDO::PARAM_STR);
    $stmt->bindValue(':ADDdate', $ADDdate, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    echo "Record inserted successfully";
    $_SESSION['response'] = $response;
   header('location: ../Meal.php');
} catch (PDOException $e) {
   
}
      


?>
