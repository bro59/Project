<?php
session_start();

  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
  }

    // Connect and select the "test" database
    $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        
    }

  $_GET['comment'] = '';
      // Get player ID and user ID
    $getPlayerIdQuery = "SELECT playerID FROM player WHERE playerName = ?";
      
    $player = htmlspecialchars($_GET['player']);
       
        
    $statement1 = $mysqli->prepare($getPlayerIdQuery);
    $statement1->bind_param("s", $player);
  
     
     if($statement1->execute()) {
        $result = $statement1->get_result();


        $_POST['playerID'] =($result->fetch_assoc()['playerID']);

     }else{
        echo "Error: " . $statement1->error;
     }

    $mysqli->close();
    $statement1->close();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
         <title> <?php echo $_GET['player']; ?> Page</title>
         <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body style="background-color:rgba(9, 34, 50, 1); color:rgba(173, 216, 230, 1);">
        
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
    
    <?php
    // Connect and select the "test" database
    $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        
    }

    ?>

    <br>
    <br>

    <div class="pattern-box">


    <div style ="background-image: url('pictures/<?php echo htmlspecialchars($_GET['player']); ?>.jpg'); background-size: cover;
    background-position: center; background-repeat: no-repeat; border-radius: 16px;" class="overBox"
    >

    <?php
    $player = $_GET['player'];

    $query = "SELECT * FROM player WHERE playerName = '$player' ";

    $result = $mysqli->query($query);


    if ($result->num_rows > 0) {
        // output data of each row
        // fetch_row() puts results into an array that starts at 0
        //fetch_assoc() puts results into an associative array. Column names are the keys.
        // Here we use fetch_row(), but we might want to use fetch_assoc() later.

        while($row = $result->fetch_row()) {
          $output = " - Name: " . $row[0]. "<br><br> - Position: " . $row[2]. "<br><br> -Detailed Position: " . $row[3] .
          "<br><br> -Jersey Number: " . $row[1] . "<br><br> -Age: "  . $row[4] . "<br><br> -Nationality: " . $row[5] . "<br>";
          $player23 = $row[0];
          //echo $player23;
          echo "<div class='output'><span style='color:lightgreen;'>" . $output . "</span></div>";

          echo "<br><br>";
          
          }
    } else {
        echo "0 results";
    }

    $mysqli->close();
    ?>

    </div>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div style= " box-shadow: #004d98 0px 4px 8px;" class="comment-box">

<form method="post" action="detail.php?player=<?php echo urlencode($_GET['player']); ?>">



    <fieldset class="comment-box"> <!--  
 Seperate files  with identical interfaces-->
      <legend style = " box-shadow: #024f96 0px 4px 8px;"><?php echo $_SESSION['username']; ?></legend>



    <p><label for="comment">Comment: </label> <!--small text area with length limit -->
        
<!--	<input type="password" name="password" id = "password"></p >-->
  <textarea name="comment" id="comment" rows="10" cols="50" maxlength="6000"></textarea></p>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (!empty($_POST['comment'])) {
        $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
        if ($mysqli->connect_errno) {
            die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
            
        }

        $username = $_SESSION['username'];
        
        $player = $_GET['player'];
       
    // Get player ID and user ID
    $getPlayerIdQuery = "SELECT playerID FROM player WHERE playerName = ?";
    
    $getUserIdQuery = "SELECT UserID FROM user WHERE UserName = ?";
      
    $comment = htmlspecialchars($_POST['comment']);
    $player = htmlspecialchars($_GET['player']);
       
        
    $statement1 = $mysqli->prepare($getPlayerIdQuery);

    $statement1->bind_param("s", $player);

       
    $statement2 = $mysqli->prepare($getUserIdQuery);

    $statement2->bind_param("s", $username);
    //echo "<br><br>";
    $result1;
    $result2;  
     
     if($statement1->execute()) {
//        echo "Registration successful!";
       // echo "<br><br>"; 

        $result = $statement1->get_result();

        //echo  htmlspecialchars($result->fetch_assoc()['playerID']);

        $_POST['playerID'] =($result->fetch_assoc()['playerID']);

     //   $result1 =   htmlspecialchars($result->fetch_assoc()['playerID']);
     }else{
        echo "Error: " . $statement1->error;
     }

    $_GET['comment'] = $_POST['comment'];

      //$playerID = htmlspecialchars($result1->fetch_assoc()['playerID']);
  
      if($statement2->execute()) {
     //     echo "<br><br>"; 
          
   //   echo "Registration successful!";
       //   echo "<br><br>"; 
  
          $result = $statement2->get_result();
  
         // echo  htmlspecialchars($result->fetch_assoc()['userID']);

          $_POST['userID'] =($result->fetch_assoc()['UserID']);
  
      }else{
          echo "Error: " . $statement2->error;
      }


      

   // echo "<br><br>";

    // Insert comment into database with playerID and userID.  $comment

     $cmntQuery = "INSERT INTO comments (Content, playerID, UserID) VALUES (?, ?, ?)";
        
    $statement = $mysqli->prepare($cmntQuery);

    $playerID = (int)$_POST['playerID'];
    $userID = (int)$_POST['userID'];


    $statement->bind_param("sii", $comment, $playerID, $userID);
      
     
     if($statement->execute()) {
     //   echo "Registration successful!";
     } else {
        echo "Error: " . $statement->error;
     }
     
     $statement->close();

    $statement1->close();
    $statement2->close();    
    $mysqli->close();
       

    }

    }

    ?>
</fieldset> 


  <input style="height: 40px; width: 100px; background-color: #333333; color: white; text-align: center;" type="submit" name="submit" value="Submit" > 

</form><br><br>



    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


    <div style= " box-shadow: #004d98 0px 4px 8px;" class="comment-box">


    <h2 style = " box-shadow: #024f96 0px 4px 8px; text-align: center;"> Comments:</h2>

    <?php
    // Connect and select the "test" database
    $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        
    }

//     $position = $_GET['position'];

    $query = "SELECT * FROM comments WHERE playerID = ?";
    $statement = $mysqli->prepare($query);


    $playerID = (int)$_POST['playerID'];

    //echo "<br><br> Player ID for comments: " . $playerID . "<br><br>";

    $statement->bind_param("i", $playerID);
    $statement->execute();
    $result = $statement->get_result();

   // echo $result->num_rows;

   // echo "<br><br> number of comments above <br><br>";

    if ($result->num_rows > 0) {
        // output data of each row
        // fetch_row() puts results into an array that starts at 0
        //fetch_assoc() puts results into an associative array. Column names are the keys.
        // Here we use fetch_row(), but we might want to use fetch_assoc() later.

        while($row = $result->fetch_assoc()) {
          $player23 = $row['Content'];
          //echo $row['Content']; 
          $query = "SELECT UserID FROM comments WHERE Content = ?";
          $statement1= $mysqli->prepare($query);
          $content = $player23;
         $statement1->bind_param("s", $content);
         $statement1->execute();
         $result1 = $statement1->get_result();
         $userID = (int)$result1->fetch_assoc()['UserID'];

         $query = "SELECT UserName FROM user WHERE UserID = ?";
         $statement2 = $mysqli->prepare($query);
         $statement2->bind_param("i", $userID);
         $statement2->execute();
         $result2 = $statement2->get_result();
         $username = $result2->fetch_assoc()['UserName'];
       echo "<fieldset style='border: 1px solid #004d98;'><legend style='color: #004d98;'>$username</legend><div class='output2'>" 
        . $player23 .
        "</div></fieldset>";

        $statement2->close();
        $statement1->close();

        echo "<br><br>";


          
          }
    } else {
        echo "0 results";
    }

    $mysqli->close();

    ?> 

    </div>

 





    


    </body>


</html>