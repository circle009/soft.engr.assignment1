<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: Login.php');
    exit;
}

include('database/connection.php');

try {
    $query = "SELECT * FROM food_list";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $foodlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['foodlist'] = $foodlist;
} catch (PDOException $e) {
    $error_message = "Error fetching food list: " . $e->getMessage();
    die($error_message);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FA Meal - Fitness App</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Add custom CSS for styling */
        .container-mid {
            margin: 20px;
        }
        input[type="text"] {
            padding: 5px;
            width: 200px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fitness App</h1>
    </header>

    <?php include('partials/menubar.php'); ?>

    <div class="container">
        <div class="container-mid">
            <input type="text" id="search" placeholder="Search by Food Name" />

            <table id="foodTable">
                <thead>
                    <tr>
                        <th>foodID</th>
                        <th>Food Name</th>
                        <th>Serving Size</th>
                        <th>Calories</th>
                        <th>Carbs</th>
                        <th>Proteins</th>
                        <th>Fats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($foodlist as $food): ?>
                        <tr onclick="navigateToUpdateMeal(
                            '<?= addslashes($food['foodID']) ?>',
                            '<?= addslashes($food['food']) ?>',
                            '<?= addslashes($food['servingSize']) ?>',
                            '<?= addslashes($food['calories']) ?>',
                            '<?= addslashes($food['Carbohydrates']) ?>',
                            '<?= addslashes($food['Protein']) ?>',
                            '<?= addslashes($food['Fat']) ?>'
                        )">
                            <td><?= htmlspecialchars($food['foodID']) ?></td>
                            <td><?= htmlspecialchars($food['food']) ?></td>
                            <td><?= htmlspecialchars($food['servingSize']) ?></td>
                            <td><?= htmlspecialchars($food['calories']) ?></td>
                            <td><?= htmlspecialchars($food['Carbohydrates']) ?></td>
                            <td><?= htmlspecialchars($food['Protein']) ?></td>
                            <td><?= htmlspecialchars($food['Fat']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JavaScript function to navigate to update meal page with food details
        function navigateToUpdateMeal(foodID, food, servingSize, calories, carbs, protein, fat) {
            const url = `updatemeal.php?foodID=${encodeURIComponent(foodID)}&food=${encodeURIComponent(food)}&servingSize=${encodeURIComponent(servingSize)}&calories=${encodeURIComponent(calories)}&carbs=${encodeURIComponent(carbs)}&protein=${encodeURIComponent(protein)}&fat=${encodeURIComponent(fat)}`;
            window.location.href = url;
        }

        // JavaScript function to filter table rows based on search input
        document.getElementById('search').addEventListener('input', function() {
            const searchText = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#foodTable tbody tr');

            rows.forEach(row => {
                const foodName = row.children[1].innerText.toLowerCase();
                if (foodName.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
