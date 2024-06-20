<?php
      session_start();
      // if(isset($_SESSION['user'])) header('location: Dashboard.php');

      $error_message = '';

      if($_POST){
            include('database/connection.php');

            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query =    'SELECT * 
                        FROM user 
                        WHERE user.username = "'. $username .'" AND user.password ="'. $password .'"
                        ';
            $stmt = $conn->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() > 0){
                  $stmt->setFetchMode(PDO::FETCH_ASSOC);
                  $user = $stmt->fetchAll()[0];
                  $_SESSION['user'] = $user;
                  
                  //successful login go to dashboard link
                  header('Location: Dashboard.php');
            }else 
                  $error_message = 'Username or Password is incorrect.';

      }

?>


<!DOCTYPE html>
<html>
      <head>
            <title>FA Login - Fitness App</title>
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


            <div class="container-login">
                  <form action="login.php" method="POST">
                        <div class="loginInputsContainer">
                              <label for="">Username</label>
                              <input type="text"      placeholder="username"  name="username"/>
                        </div>
                        <div class="loginInputsContainer">
                              <label for="">Password</label>
                              <input type="password"  placeholder="password"  name="password"/>
                        </div>

                        <div class="loginButtonContainer">
                              <button>login</button>
                        </div>
                        <!-- <nav> -->
                              <h4>
                                    <a href="Register.php">Create new account</a>
                              </h4>
                        <!-- </nav> -->
                  </form> 
                  
                  
            </div>
        
      </body>
</html>