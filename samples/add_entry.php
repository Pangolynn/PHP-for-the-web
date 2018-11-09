<!doctype html></doctype>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add a Blog Entry</title>
  </head>

  <body>
  <h1>Add a Blog Entry</h1>
  <?php 
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $host = 'localhost';
      $username = 'root';
      $password = '';
      $dbn = 'myblog';

      $dbc = mysqli_connect($host, $username, $password, $dbn);

      mysqli_set_charset($dbc, 'utf8');

      $problem = FALSE;

      if (!empty($_POST['title']) && !empty($_POST['entry']) ) {
        // Strip tags helps prevent xss atacks
        // Escaping helps prevent sql injection attacks
        $title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
        $entry = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entry'])));

      } else {
        print '<p style="color: red;">Please submit both a title and an entry.</p>';
        $problem = TRUE;
      }

      if (!$problem) {

        $query = "INSERT INTO entries (id, title, entry, date_entered) 
          VALUES (0, '$title', '$entry', NOW())";
        if (@mysqli_query($dbc, $query)) {
          print '<p>The blog entry has been added.</p>';
        } else {
          print '<p style="color: red;">Could not add entry because<br>' . 
          mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }

      }
      mysqli_close($dbc);
    }

  ?>
  <form action="add_entry.php" method="post">
    <p>Entry Title: <input type="text" name="title" size="40" maxsize="100"></p>
    <p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p>
    <input type="submit" name="submit" value="Post Entry">
  </form>
  </body>
</html>