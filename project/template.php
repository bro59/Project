<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
         <title> PLAYER DETAILLS</title>
         <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body style ="background-color:rgba(9, 34, 50, 1); color:rgba(173, 216, 230, 1);">

    
  <div class="header">

    <ul style="size: 25cm;">
      
  <li style="size: 4cm; padding: 10px;">

<form method="post" action="selectPlayer.php">   

  <h1><input type="submit" name="submit" value="Delete Player" style="background-color: #333333;  color: white; size: 25mm;"></h1> 

</form>

</li>

          <li style="size: 4cm; padding: 10px;">

<form method="post" action="navigTutorial.php">   

  <h1><input type="submit" name="submit" value="Home" style="background-color: #333333;  color: white; size: 25mm;"></h1> 

</form>

</li>


  <li style="size: 4cm; padding: 10px;">

<form method="post" action="logout.php">   

  <h1><input type="submit" name="submit" value="Logout" style="background-color: #333333;  color: white; size: 25mm;"></h1> 

</form>

</li>


</ul>
  </div>

   
    <br>
    <br>
    <br>
    <br>
    <br>
     





    
      <div class = "startClass">
    
    <?php
    // Connect and select the "test" database
    $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        
    }else {
    //    echo "Connection Successful <>br><br>";
    }
    ?>

    <?php
    
    $position = $_GET['position'];

    $query = "SELECT * FROM player WHERE Position = '$position' ";

    $result = $mysqli->query($query);

    


    if ($result->num_rows > 0) {
        // output data of each row
        // fetch_row() puts results into an array that starts at 0
        //fetch_assoc() puts results into an associative array. Column names are the keys.
        // Here we use fetch_row(), but we might want to use fetch_assoc() later.

        while($row = $result->fetch_row()) {
          $output = "Name: " . $row[0]. " - Position: " . $row[2].  "<br>";
          $player23 = $row[0];
          echo $player23;

          echo "<br><br>";
          
          $_GET['player'] = $row[0];
          $playerurl="href=detail.php?player=" . urlencode($row[0]); //Urlencode to handle spaces and special characters

          $_SESSION['player'] = urlencode($row[0]);

          echo "<a " . $playerurl . "><span style='color:rgba(173, 216, 230, 1);'>" . $output . "</span></a>";      
         
          // echo '<a ' . $playerurl . '>' . $output . '</a><br><br>';
          echo "<br><br>";
          
          }
    } else {
        echo "0 results";
    }

    $mysqli->close();
    ?>

    <br>
    <br>

        </div>








        </body>


</html>

