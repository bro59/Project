<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

 $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
       
    }else {
        echo "<br><br>";
    }

    $username = $_SESSION['username'];

    $getUserIdQuery = "SELECT UserID FROM user WHERE UserName = ?";

    $statement = $mysqli->prepare($getUserIdQuery);
    $statement->bind_param("s", $username);
    $statement->execute();
    $result = $statement->get_result();
    $userID = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userID = $row['UserID'];
    } else {
        echo "User not found.";
        exit;
    }

    $_SESSION['userID'] = $userID;

    $adminUsername = "Admin13";

    $getUserIdQuery = "SELECT UserID FROM user WHERE UserName = ?";

    $statement2 = $mysqli->prepare($getUserIdQuery);
    $statement2->bind_param("s", $adminUsername);
    $statement2->execute();
    $result = $statement2->get_result();
    $AdminID = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $AdminID = $row['UserID'];
        $_SESSION['AdminID'] = $AdminID;
    } else {
        echo "User not found.";
        exit;
    }

    if(!isset($_SESSION['userID']) || ($_SESSION['userID'] != $AdminID)) {
        
    
    
    
        echo "You do not have permission to access this page.";
        sleep(5);
        header("Location: navigTutorial.php");
        exit;
    }


    $statement->close();
    $statement2->close();
    $mysqli->close();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
         <title> Dynamic Navigation Tutorial </title>
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



    <h1> Display delete information </h1>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="form-container" style = "color: darkblue; text-align: center;">
        
        <?php
        // Connect and select the "test" database
        $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
        if ($mysqli->connect_errno) {
            die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        }


        $sqlQuery = "SELECT COUNT(1) FROM player WHERE playerName = ?";
        
        $statement = $mysqli->prepare($sqlQuery);

        $userInput = htmlspecialchars($_POST['playername']);

        $statement->bind_param("s", $userInput);
        $statement->execute();
        $statement->bind_result($count);
        $statement->fetch();
        $statement->close();

        if(((htmlspecialchars($_POST['playername'])) !== null) && ($count)) {

            $playerToDelete = htmlspecialchars($_POST['playername']);



            // Prepare the DELETE statement
            
            $stmt = $mysqli->prepare("DELETE FROM player WHERE playerName = ?");

            $stmt->bind_param("s", $playerToDelete);

            echo "<div class='output'><span style='color:black;'>" . "Deleted player: " . $playerToDelete . "</span></div>";
            
            
            // Execute the statement
            if($stmt->execute()) {
                // Successfully deleted
            } else {
                echo "Error deleting player: " . $mysqli->error;
            }

            // Close the statement
            $stmt->close();

            echo "Player deleted successfully. <br><br>";

        } 
        
        if((htmlspecialchars($_POST['playername'])) === null) {
            echo "No player specified for deletion.";
        }
        
        if(!$count) {
            echo "Player not found in the database.";
        }
        
        $mysqli->close();
      

    ?>
    
        
    <!-- <p>Player deleted successfully.</p> -->
    
</div>


    
    








</body>


</html>

