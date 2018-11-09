<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Connect to MySql</title>
  </head>
  <body>
  <?php
    // Sample file for MySQL Database Connection

    // Replace below values with the correct ones for your environment
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbn = 'myblog';

    // @ is used to supress errors, so that you may deal with them yourself
    if ($dbc = @mysqli_connect($host, $username, $password, $dbn)) {
      print '<p>Successfully connected to the db!</p>';

    // Make sure to close the connection when you are done with it.
      mysqli_close($dbc);
    } else {
      print '<p style="color: red;">Could not connect to the db.: <br>' 
        . mysqli_connect_error() . '</p>';
    }
  ?>
  </body>
</html>