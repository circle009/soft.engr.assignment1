<?php
session_start();
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>FA EditProfile - Fitness App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="loginBody">
    <?php if(!empty($error_message)) { ?>
        <div id="errorMessage">
            <p>Error: <?= htmlspecialchars($error_message) ?> </p>
        </div>
    <?php } ?>

    <header>
        <h1>Fitness App</h1>
    </header>

    <div class="container-register">
        <form action="database/AddmealToDB.php" method="POST">
            <nav>
                <a>Add New Meal</a>
            </nav>
            <div class="input-container">
                <input type="text" placeholder="Food Name" name="FoodName" class="input-box" required />
            </div>
            <div class="input-container">
                <input type="text" placeholder="Serving" name="Serving" class="input-box" required />
            </div>
            <div class="input-container">
                <input type="number" placeholder="Calorie Content" name="CalorieContent" class="input-box" step="0.01" required />
            </div>
            <div class="input-container">
                <input type="number" placeholder="Carbs Content in Grams" name="CarbsContentinGrams" class="input-box" step="0.01" required /> 
            </div>
            <div class="input-container">
                <input type="number" placeholder="Fat Content in Grams" name="FatContentinGrams" class="input-box" step="0.01" required /> 
            </div>
            <div class="input-container">
                <input type="number" placeholder="Protein Content in Grams" name="ProteinContentinGrams" class="input-box" step="0.01" required /> 
            </div>
            
            <div class="loginButtonContainer">
                <button type="submit">Add</button>
                <button type="button" onclick="window.location.href='Settings.php'">Cancel</button>
            </div>
        </form>        
    </div>
</body>
</html>
