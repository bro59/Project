<!DOCTYPE html>

<html lang="en">
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title> Credential form </title>
        <link rel="stylesheet" href="style.css">

    </head>
<body>
    

    
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
    $UserName = htmlspecialchars($_POST['username']);
    $Password = htmlspecialchars($_POST['password']);

    $passHash = password_hash($Password, PASSWORD_DEFAULT);

    $sqlQuery = "INSERT INTO user (UserName, password) VALUES (?, ?)";
        
    $statement = $mysqli->prepare($sqlQuery);


    $statement->bind_param("ss", $UserName, $passHash);
      
     
     if($statement->execute()) {
//        echo "Registration successful!";
     } else {
        echo "Error: " . $statement->error;
     }
     
     $statement->close();

    $mysqli->close();
    ?>
    



    <div class="form-container">

<form method="post" action="handlelogin.php" >
 
          <fieldset> <!--  
 Seperate files  with identical interfaces. login.php will send user to the navigTutorial.php page -->
      <legend>Registration</legend>

  <p><label for="username">Username: </label> 
  <input type="text" id="username" name="username"> </p><br>

    <p><label for="password">Password: </label> <!--small text area with length limit -->
        
	<input type="password" name="password" id = "password" size="20" maxlength="40" ></p>

    </fieldset> 


  <input type="submit" name="submit" value="Login" > 

</form><br><br>


    </div>

</body>
</html>