<?php

define('TITLE', 'Login');
include('templates/header.html');

print '<h2>Login Form</h2>
      <p>Users who are logged in can take advantage of certain features like meh</p>';

      // Check to see if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Handle the form
  if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
    if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'password') ) {
      session_start();
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['loggedin'] = time();
      ob_end_clean();
      header('Location: welcome.php');
      exit();
    } else {
      print '<p class="text--error">The submitted email and password do not match those on file</p>';
    }
  } else { 
    print '<p class="text--error">Please make sure you enter an email and a password.</p>';
  }
} else {
  print '<form action="login.php" method="post" class="form--inline">
    <p>
      <label for="email">Email Address:</label>
      <input type="email" name="email" size="20">
    </p>
    <p>
      <label for="password">Password</label>
      <input type="password" name="password" size="20">
    </p>
    <p>
      <input type="submit" name="submit" value="Log In" class="button--pill">
    </p>
  </form>';
}

include('templates/footer.html');

?>
