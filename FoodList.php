<?php
   session_start();
   // if(!isset($_SESSION['user'])) header('location: Login.php');
   // 

   // $user = $_SESSION['user'];
   if (isset($_GET['meal'])) {
      $meal = $_GET['meal'];
      $date = $_GET['date'];
      
   } else{
      header('location: Meal.php');
   }
   include('database/connection.php');

   $query = "
        SELECT * FROM food_list
        ORDER BY food ASC
        ";

   $stmt = $conn->prepare($query);
   $stmt->execute();
   $foodlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $_SESSION['foodlist'] = $foodlist;
   
   
?>

<!DOCTYPE html>
<html>
      <head>
            <title>FA Meal - Fitness App</title>
            <link rel="stylesheet" href="css/style.css">
      </head>

      <body>
         <header>
            <h1>Fitness App</h1>
         </header>
      
         <?php include('partials/menubar.php') ?>

         <div class="container">
            
            <div class="container-mid">
               
               
               <label id="meal"><?= $meal ?></label>
               <input type="text" id="search" placeholder="Search by Food Name" />


               <table>
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Food Name</th>
                        <th>Serving Size</th>
                        <th>Calories</th>
                        <th>Carbs</th>
                        <th>Proteins</th>
                        <th>Fats</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                              $counter = 1; // Initialize the counter
                              foreach ($foodlist as $foodlists):
                     ?>
                        <tr onclick="navigateToCourseInformation(this)">
                           <td><?= $counter ?></td>
                           <td><?= $foodlists['food'] ?></td>
                           <td><?= $foodlists['servingSize'] ?></td>
                           <td><?= $foodlists['calories'] ?></td>
                           <td><?= $foodlists['Carbohydrates'] ?></td>
                           <td><?= $foodlists['Protein'] ?></td>
                           <td><?= $foodlists['Fat'] ?></td>
                           <td hidden><?= $meal ?></td>
                           <td hidden><?= $date ?></td>
                        </tr>
                     <?php $counter++; // Increment the counter
                        endforeach;
                     ?>
                  </tbody>
               </table>
            </div>

         </div>
         
      <script>
         function navigateToCourseInformation(row) {
         //    const url = `Dashboard.php`;

         //        // Navigate to the new page
         //        window.location.href = url;

            const cells = row.getElementsByTagName('td');
            const tdValue1 = cells[1].innerText.trim(); // foodname
            const tdValue2 = cells[2].innerText.trim(); // serving size
            const tdValue3 = cells[3].innerText.trim(); // calories
            const tdValue4 = cells[4].innerText.trim(); // carbs
            const tdValue5 = cells[5].innerText.trim(); // protein
            const tdValue6 = cells[6].innerText.trim(); // fat
            const tdValue7 = cells[7].innerText.trim(); // meal
            const tdValue8 = cells[8].innerText.trim(); // date 

            const url = `database/addmeal.php?
                        ADDfood=${encodeURIComponent(tdValue1)}
                        &ADDservingsize=${encodeURIComponent(tdValue2)}
                        &ADDcalories=${encodeURIComponent(tdValue3)}
                        &ADDcarbs=${encodeURIComponent(tdValue4)}
                        &ADDprotein=${encodeURIComponent(tdValue5)}
                        &ADDfat=${encodeURIComponent(tdValue6)}
                        &ADDmeal=${encodeURIComponent(tdValue7)}
                        &ADDdate=${encodeURIComponent(tdValue8)}   
                        `;
            window.location.href = url;
      
         }
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