<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}


// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
header("Location: login.php");
exit;
?>
