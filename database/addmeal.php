<?php
   session_start();
   $user = $_SESSION['user'];

   function getParam($name) {
      return isset($_GET[$name]) ? htmlspecialchars(trim($_GET[$name])) : '';
   }
   
   $account = $user['account_id'];
   $food =        getParam('food');
   $servingSize = getParam('servingSize');
   $calories =    getParam('calories');
   $carbs =       getParam('carbs');
   $protein =     getParam('protein');
   $fat =         getParam('fat');
   $meal =        getParam('meal');
   $date =        getParam('date');

   // print_r($account); print_r('<br>');
   // print_r($food); print_r('<br>');
   // print_r($servingSize); print_r('<br>');
   // print_r($calories); print_r('<br>');
   // print_r($carbs); print_r('<br>');
   // print_r($protein); print_r('<br>');
   // print_r($fat); print_r('<br>');
   // print_r($meal); print_r('<br>');
   // print_r($date); print_r('<br>');
   

   //ADD RECORD
   // try{
      include('connection.php');
      $command = "
    INSERT INTO meal (account_ID, foodID, meal, meal_date)
    VALUES (
        :account_ID,
        (SELECT foodID FROM food_list WHERE food = :food),
        :meal,
        :date
    )
";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($command);

    // Bind parameters
    $stmt->bindValue(':account_ID', $account, PDO::PARAM_STR);
    $stmt->bindValue(':food', $food, PDO::PARAM_STR);
    $stmt->bindValue(':meal', $meal, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    echo "Record inserted successfully";
    $_SESSION['response'] = $response;
   header('location: ../Meal.php');
} catch (PDOException $e) {
   
}
      


?>
