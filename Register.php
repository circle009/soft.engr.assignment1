<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 

?>

<!DOCTYPE html>
<html>
      <head>
            <title>FA Register - Fitness App</title>
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
               <form action="database/add.php" method="POST">
                  <h3>
                     <a>Register</a>
                  </h3>
                  <div class="registerInputsContainer">
                     <label for="">Username</label>
                     <input type="text" placeholder="username"  name="username"/>
                  </div>
                  <div class="registerInputsContainer">
                     <label for="">Password</label>
                     <input type="password" placeholder="password"  name="password"/>
                  </div>
                  <div class="registerInputsContainer">
                     <label for="">Fullname</label>
                     <input type="text" placeholder="Full name"  name="fullname"/>
                  </div>
                  <div class="registerInputsContainer">
                     <label for="">Gender</label>
                     <select id="gender" name="gender">
                            <option value="">   </option>
                            <option value="M">Male   </option>
                            <option value="F">Female   </option>
                            <option value="O">Others   </option>
                        </select>
                  </div>
                  <div class="registerInputsContainer">
                     <label for="">What is your Height?</label>
                     <input type="number" id="height" name="height" placeholder="in CM" min="0" max="999" step="1" />
                  </div>
                  <div class="registerInputsContainer">
                     <label for="">What is your Weight?</label>
                     <input type="number" id="weight" name="weight" placeholder="in KG" min="0" max="999" step="1" />
                     
                  </div>
                  
                  <div class="loginButtonContainer">
                     <button>Register</button>
                  </div>
               </form>        

            </div>
      </body>
</html>