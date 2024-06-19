<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['error_message'] = "You must be logged in to update a meal.";
    header('location: ../Login.php');
    exit;
}

include('connection.php'); // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_id = $_POST['foodID']; // Assuming 'foodID' is the name in your form
    $food_name = $_POST['FoodName'];
    $serving_size = $_POST['Serving'];
    $calories = $_POST['CalorieContent'];
    $carbs = $_POST['CarbsContentinGrams'];
    $fat = $_POST['FatContentinGrams'];
    $protein = $_POST['ProteinContentinGrams'];

    try {
        $query = "
            UPDATE food_list 
            SET food = :food, 
                servingSize = :servingSize, 
                calories = :calories, 
                Carbohydrates = :carbs, 
                Fat = :fat, 
                Protein = :protein 
            WHERE foodID = :food_id"; // Adjusted to use 'foodID'

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':food_id', $food_id);
        $stmt->bindParam(':food', $food_name);
        $stmt->bindParam(':servingSize', $serving_size);
        $stmt->bindParam(':calories', $calories);
        $stmt->bindParam(':carbs', $carbs);
        $stmt->bindParam(':fat', $fat);
        $stmt->bindParam(':protein', $protein);

        $stmt->execute();

        $_SESSION['success_message'] = "Meal updated successfully.";
        header('location: ../FoodList-update.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error updating meal: " . $e->getMessage();
        header('location: ../updatemeal.php?id=' . $food_id); // Redirect with foodID
        exit;
    }
} else {
    $_SESSION['error_message'] = "Invalid request method.";
    header('location: ../FoodList-update.php');
    exit;
}
?>
