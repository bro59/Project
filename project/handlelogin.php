<?php
// Always start the session at the very beginning of the script
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password'];

    // In a real application, you would fetch the user's data
    // and the stored hashed password from your database based on the username.
   
    // Example data (replace with database retrieval logic):
    // The hash below is for the password 'mypassword123'

      // Connect and select the "test" database
    $mysqli = new mysqli("localhost", "root", "", "projectsoccer");
    if ($mysqli->connect_errno) {
        die("Connection Failed: ($mysqli->connect_errno) $mysqli->connect_error");
        
    }else {
    //    echo "Connection Successful <>br><br>";
    }
    $sqlQuery = "SELECT password FROM user WHERE UserName = ?";
    $statement = $mysqli->prepare($sqlQuery);

    $statement->bind_param("s", $submitted_username);
    $statement->execute();
    $result = $statement->get_result();
    
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_hash = $row['password'];
    } else {
        echo "Invalid username or password.";
        exit;
    }

    // Verify the submitted password against the stored hash
    if (password_verify($submitted_password, $stored_hash)) {
        // Password is correct!
       
        // Store user information in a session variable to keep them logged in
        $_SESSION['username'] = $submitted_username;
        $_SESSION['loggedin'] = true;

        // Redirect to the dashboard page
        header("Location: navigTutorial.php");
        exit; // Important: Always call exit after a header redirect
    } else {
        // Invalid password
        // You might redirect back to the login page with an error message
        echo "Invalid username or password.";
        header("Location: login.php?error=1");
    }
} else {
    // If someone tries to access this script directly without POST data
    header("Location: login.php");
    exit;
}

?>