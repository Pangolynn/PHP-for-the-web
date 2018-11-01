<?php

define('TITLE', 'Register');
include('templates/header.html');

print '<h2>Registration Form</h2>';



if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
  $problem = false;

  if (empty($_POST['first_name'])) {
    $problem = true;
    print '<p class="text-error">Please enter your first name.</p>';
  }

  if (empty($_POST['last_name'])) {
    $problem = true;
    print '<p class="_c-state-error">Please enter your last name.</p>';
  }

  // check to make sure there is not more than one email address to prevent spam
  if (empty($_POST['email']) || (substr_count($_POST['email'], '@') != 1)) {
    $problem = true;
    print '<p class="_c-state-error">Please enter your email.</p>';
  }

  if (empty($_POST['password1'])) {
    $problem = true;
    print '<p class="_c-state-error">Please enter a password.</p>';
  }

  if ($_POST['password1'] != $_POST['password2']) {
    $problem = true;
    print '<p class="_c-state-error">Your passwords did not match.</p>';
  }

  if (!$problem) {
    print '<p class="text-success">You are now registered!</p>';

    $body = "Thank you, {$_POST['first_name']}, for registering.";
    
    // Send email confirmation
    // mail($_POST['email'], 'Regisration Confirmation', $body, 'From: admin@example.com');

    $_POST = [];

  } else {
    print '<p class="_c-state-error">Please try again!</p>';
  }

}

?>
<form action="register.php" method="post" class="form--inline">
  <p>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" size="20" 
      value="<?php 
        if (isset($_POST['first_name'])) {
          print htmlspecialchars($_POST['first_name']);
        } 
      ?>">
  </p>

  <p>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" size="20" 
      value="<?php 
        if (isset($_POST['last_name'])) {
          print htmlspecialchars($_POST['last_name']);
        } 
      ?>">
  </p>

  <p>
    <label for="email">Email:</label>
    <input type="email" name="email" size="20" 
      value="<?php 
        if (isset($_POST['email'])) {
          print htmlspecialchars($_POST['email']);
        } 
      ?>">
  </p>

  <p>
    <label for="password1">Password:</label>
    <input type="password" name="password1" size="20" 
      value="<?php 
        if (isset($_POST['password1'])) {
          print htmlspecialchars($_POST['password1']);
        } 
      ?>">
  </p>
  <p>
    <label for="password2">Confirm Password:</label>
    <input type="password" name="password2" size="20" 
      value="<?php 
        if (isset($_POST['password2'])) {
          print htmlspecialchars($_POST['password2']);
        } 
      ?>">
  </p>

  <p>
    <input type="submit" name="submit" value="Register" class="button--pill">
  </p>
</form>

<?php include('templates/footer.html'); ?>