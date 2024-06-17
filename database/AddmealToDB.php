<?php
session_start();

$table_name = $_SESSION['table'];
$_SESSION['table'] = '';

$FoodName = $_POST['FoodName'];
$Serving = $_POST['Serving'];
$CalorieContent = floatval($_POST['CalorieContent']);
$CarbsContentinGrams = floatval($_POST['CarbsContentinGrams']);
$FatContentinGrams = floatval($_POST['FatContentinGrams']);
$ProteinContentinGrams = floatval($_POST['ProteinContentinGrams']);

// ADD RECORD
try {
    include('connection.php');

    $command = "INSERT INTO food_list (food, servingSize, calories, Carbohydrates, Protein, Fat)
                VALUES (:food, :serving, :calories, :carbs, :protein, :fat)";

    $stmt = $conn->prepare($command);
    $stmt->bindParam(':food', $FoodName);
    $stmt->bindParam(':serving', $Serving);
    $stmt->bindParam(':calories', $CalorieContent);
    $stmt->bindParam(':carbs', $CarbsContentinGrams);
    $stmt->bindParam(':protein', $ProteinContentinGrams);
    $stmt->bindParam(':fat', $FatContentinGrams);

    $stmt->execute();

    $response = [
        'success' => true,
        'message' => $FoodName . ' successfully added.'
    ];

} catch (PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header('location: ../Settings.php');
exit();
?>
