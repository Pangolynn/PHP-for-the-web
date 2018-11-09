<?php

  $loggedin = false;
  $error = false;

  // Check for form submission
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Form handling
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

      // Check for valid credentials
      if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) {

        // Set cookie
        setcookie('Samuel', 'Clemens', time()+3600);

        // Indicate logged in (for footer links)
        $loggedin = true;

      } else { // Invalid Credentials

        $error = 'The submitted email address and password do not match those on file.';
      }

    } else { // Missing Field
      $error = 'Please fill out all fields.';
    }

  }

  define('TITLE', 'Login');
  include('templates/header.html');

  if ($error) {
    print '<p class="error">' . $error . '</p>';
  }

  if ($loggedin) {
    print '<p>You are now logged in.</p>';
  } else {
    print '<h2>Login Form</h2>
    <form action="login.php" method="post">
      <p><label>Email Address: <input type="email" name="email"></label></p>
      <p><label>Password: <input type="password" name="password"></label></p>
      <p><input type="submit" name="submit" value="Log In"></p>
    </form>';
  }

  include('templates/footer.html');