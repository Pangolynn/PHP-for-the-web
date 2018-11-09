<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Create a Table</title>
  </head>

  <body>
  <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbn = 'myblog';
    if ($dbc = @mysqli_connect($host, $username, $password, $dbn)) {
      $query = 
        'CREATE TABLE entries (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        entry TEXT NOT NULL,
        date_entered DATETIME NOT NULL) CHARACTER SET utf8';

      if (@mysqli_query($dbc, $query)) {
        print '<p>The table has been created!</p>';
      } else {
        '<p style="color: red;">Could not create the table because:<br>'
          . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
      }
      mysqli_close($dbc);

    } else {
      print '<p style="color: red;">Could not connect to the databse:<br>' . 
        mysqli_connect_err() . '.</p>';
    }
  ?>
  </body>
</html>