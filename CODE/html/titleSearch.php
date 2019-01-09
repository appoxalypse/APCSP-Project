<!DOCTYPE html>
<html>

  <head>
    <title>PHP TEST</title>
  </head>

  <body>

    <?php

      //Connect to database
      $host = "127.0.0.1";
      $user = "appoxalypse";
      $pass = "";
      $db = "web_novels"; //change this part later
      $port = 3306;
      $connection = mysqli_connect($host, $user, $pass, $db, $port) or dle(mysql_error());

      //Call data from the database
      if (isset($_POST['submit'])) {
        echo 'Web Novels with titles that start with the letter: ';
        echo $_POST['fletter'];
      }
     ?>

  </body>

</html>
