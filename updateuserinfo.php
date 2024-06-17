<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fitness_app';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch user data for the logged-in user
    $query = "SELECT username, password, fullname, gender, height, weight
              FROM user
              WHERE username = :username";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $_SESSION['user']['username']);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $username = htmlspecialchars($user['username']);
        $password = htmlspecialchars($user['password']);
        $fullname = htmlspecialchars($user['fullname']);
        $gender = htmlspecialchars($user['gender']);
        $height = htmlspecialchars($user['height']);
        $weight = htmlspecialchars($user['weight']);
    } else {
        die("No user found with the logged-in username.");
    }

} catch (PDOException $e) {
    $error_message = $e->getMessage();
    die("Connection failed: " . $error_message);
}
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
            <p>Error: <?= $error_message ?> </p>
        </div>
    <?php } ?>

    <header>
        <h1>Fitness App</h1>
    </header>

    <div class="container-register">
        <form action="database/update.php" method="POST">
            <nav>
                <a>updateusername</a>
            </nav>
            <div class="registerInputsContainer">
                <label for="">Username</label>
                <input type="text" placeholder="username"  name="username" value="<?php echo htmlspecialchars($username); ?>" readonly/>
            </div>
            <div class="registerInputsContainer">
                <label for="">Password</label>
                <input type="password" placeholder="password"  name="password" value="<?php echo htmlspecialchars($password); ?>"/>
            </div>
            <div class="registerInputsContainer">
                <label for="">Fullname</label>
                <input type="text" placeholder="Full name"  name="fullname" value="<?php echo htmlspecialchars($fullname); ?>"/>
            </div>
            <div class="registerInputsContainer">
                <label for="">Gender</label>
                <select id="gender" name="gender">
                    <option value="">   </option>
                    <option value="M" <?php echo ($gender == 'M') ? 'selected' : ''; ?>>Male</option>
                    <option value="F" <?php echo ($gender == 'F') ? 'selected' : ''; ?>>Female</option>
                    <option value="O" <?php echo ($gender == 'O') ? 'selected' : ''; ?>>Others</option>
                </select>
            </div>
            <div class="registerInputsContainer">
                <label for="">What is your Height?</label>
                <input type="number" id="height" name="height" placeholder="in CM" min="0" max="999" step="1" value="<?php echo htmlspecialchars($height); ?>"/>
            </div>
            <div class="registerInputsContainer">
                <label for="">What is your Weight?</label>
                <input type="number" id="weight" name="weight" placeholder="in KG" min="0" max="999" step="1" value="<?php echo htmlspecialchars($weight); ?>"/>
            </div>
            
            <div class="loginButtonContainer">
                <button type="submit">Update</button>
                <button type="submit">Cancel</button>
            </div>
        </form>        
    </div>
</body>
</html>

