<?php

session_start();

$_SESSION = [];

session_destroy();

define('TITLE', 'Logout');
include('templates/header.html');
?>

<h2>Welcome to the club.</h2>
<p>You are now logged out.</p>

<?php include('templates/footer.html');
?>