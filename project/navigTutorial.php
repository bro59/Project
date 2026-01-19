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

<form method="post" action="logout.php">   

  <h1><input type="submit" name="submit" value="Logout" style="background-color: #333333;  color: white; size: 25mm;"></h1> 

</form>

</li>


</ul>
  </div>
    
  
  
    <br>
    <br>
    <br>

    <h2 style = "box-shadow: #004d98 0px 4px 8px; text-align: center; 
     border-radius: 15px;" > Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! <br><br> We've been waiting for you.</h2>


  
    <h1> Dynamic Navigation Tutorial </h1>



    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   

    <div class="startClass">
        <h2 style="text-align: center; color:rgba(173, 216, 230, 1);"> Select a Position to View Players </h2>
    <?php
    $goalKeepQuery = "Goalkeeper";
    $Gkurl="href=template.php?position=$goalKeepQuery";
    $_GET['position'] = $goalKeepQuery;
    //    echo "<span style='color:rgba(173, 216, 230, 1);'>" . $output . "</span>";
    //
    ?>

    <!-- <a <?php //echo $Gkurl; ?> >GOALKEEPERS</a> -->

    <?php
    echo "<h3><a " . $Gkurl . "><span style='color:rgba(173, 216, 230, 1);'>GOALKEEPERS</span></a></h3>";

    ?>





    <br>
    <br>

    <?php
    $defenderQuery = "Defender";
    $Defurl="href=template.php?position=$defenderQuery";
    $_GET['position'] = $defenderQuery;
   
    ?>

      <?php
    echo "<h3><a " . $Defurl . "><span style='color:rgba(173, 216, 230, 1);'>DEFENDERS</span></a></h3>";

    ?>

<!--     <a <?php echo $Defurl; ?> >DEFENDERS</a> -->

     
    <br>
    <br>

    <?php

    $midfieldQuery = "Midfielder";
    $Midurl="href=template.php?position=$midfieldQuery";
    $_GET['position'] = $midfieldQuery;
    ?>

   <!-- <a <?php echo $Midurl; ?> >MIDFIELDERS</a>-->

      <?php
    echo "<h3><a " . $Midurl . "><span style='color:rgba(173, 216, 230, 1);'>MIDFIELDERS</span></a></h3>";

    ?> 
    <br>
    <br>

    <?php
    $forwardQuery = "Forward";
    $forwurl="href=template.php?position=$forwardQuery";
    $_GET['position'] = $forwardQuery;
    ?>


    <!--<a <?php echo $forwurl; ?> >FORWARDS</a> -->

      <?php
    echo "<h3><a " . $forwurl . "><span style='color:rgba(173, 216, 230, 1);'>FORWARDS</span></a></h3>";

    ?>


    </div>



</body>


</html>

