<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <style type="text/css" media="screen">
      .error { color: red; }
    </style>
  </head>

  <body>
  <h1>Register</h1>
    <?php
      $dir = '../users/';
      $file = $dir . 'users.txt';

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $problem = FALSE;

        if (empty($_POST['username'])) {
          $problem = TRUE;
          print '<p class="error">Please enter a username.</p>';
        }

        if (empty($_POST['password1'])) {
          $problem = TRUE;
          print '<p class="error">Please enter a password.</p>';
        }

        if($_POST['password1'] != $_POST['password2']) {
          $problem = TRUE;
          print '<p class="error">Passwords do not match.</p>';
        }

        if(!$problem) {
          if(is_writable($file)) {

            $subdir = time() . rand(0, 4596);
            $data = $_POST['username'] . "\t" . 
              sha1(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;

            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

            mkdir ($dir . $subdir);

            print '<p>You are now registered</p>';
          } else {
            print '<p class="error">You could not be registered due to system error</p>';
          }
        } else {
          print '<p class="error">Please go back and try again./p>';
        }
      } else { ?>
        <form action="register.php" method="post">
          <p>Username: <input type="text" name="username" size="20"></p>
          <p>Password: <input type="password" name="password1" size="20"></p>
          <p>Confirm Password: <input type="password" name="password2" size="20"></p>
          <input type="submit" name="submit" value="register">
        </form>
      <?php } ?>
  </body>
</html>