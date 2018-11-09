<?php
session_start();

define('TITLE', 'Welcome to the club!');
include('templates/header.html');

?>
<h2>Welcome to the Club!</h2>
<p>You've successfully logged in.</p>
<p>Hello <?php print $_SESSION['email']; ?></p>

<?php
date_default_timezone_set('America/New_York');

print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';

print '<p><a href="logout.php">Logout</a></p>';

include('templates/footer.html');
?>