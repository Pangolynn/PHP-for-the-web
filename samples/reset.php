<?php
//Delete cookies
setcookie('font_size', '', time() - 6000, '/', '', 0);
setcookie('font_color', '', time() - 6000, '/', '', 0);

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reset Settings</title>
  </head>

  <body>
    <p>Your settings have been reset.</p>
  </body>
</html>