<?php
session_start();
if (!isset($_SESSION['user'])) header('location: Login.php');

$user = $_SESSION['user'];

$food_id = isset($_GET['foodID']) ? $_GET['foodID'] : '';
$food_name = isset($_GET['food']) ? $_GET['food'] : '';
$serving_size = isset($_GET['servingSize']) ? $_GET['servingSize'] : '';
$calories = isset($_GET['calories']) ? $_GET['calories'] : '';
$carbs = isset($_GET['carbs']) ? $_GET['carbs'] : '';
$protein = isset($_GET['protein']) ? $_GET['protein'] : '';
$fat = isset($_GET['fat']) ? $_GET['fat'] : '';

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>FA EditProfile - Fitness App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="loginBody">
    <?php if (!empty($error_message)) { ?>
        <div id="errorMessage">
            <p>Error: <?= htmlspecialchars($error_message) ?></p>
        </div>
    <?php } ?>

    <header>
        <h1>Fitness App</h1>
    </header>

    <div class="container-register">
        <form action="database/updatemealDb.php" method="POST">
            <nav>
                <a>Update Meal</a>
            </nav>
            <input type="hidden" name="foodID" value="<?= htmlspecialchars($food_id) ?>" />
            <div class="input-container">
                <input type="text" placeholder="Food Name" name="FoodName" class="input-box" value="<?= htmlspecialchars($food_name) ?>" required />
            </div>
            <div class="input-container">
                <input type="text" placeholder="Serving" name="Serving" class="input-box" value="<?= htmlspecialchars($serving_size) ?>" required />
            </div>
            <div class="input-container">
                <input type="number" placeholder="Calorie Content" name="CalorieContent" class="input-box" step="0.01" value="<?= htmlspecialchars($calories) ?>" required />
            </div>
            <div class="input-container">
                <input type="number" placeholder="Carbs Content in Grams" name="CarbsContentinGrams" class="input-box" step="0.01" value="<?= htmlspecialchars($carbs) ?>" required /> 
            </div>
            <div class="input-container">
                <input type="number" placeholder="Fat Content in Grams" name="FatContentinGrams" class="input-box" step="0.01" value="<?= htmlspecialchars($fat) ?>" required /> 
            </div>
            <div class="input-container">
                <input type="number" placeholder="Protein Content in Grams" name="ProteinContentinGrams" class="input-box" step="0.01" value="<?= htmlspecialchars($protein) ?>" required /> 
            </div>
            
            <div class="loginButtonContainer">
                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href='FoodList-update.php'">Cancel</button>
            </div>
        </form>        
    </div>
</body>
</html>
