<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View Settings</title>
    <style type="text/css">
      body {
        font-size: <?php if (isset($_COOKIE['font_size']) ) { 
          print " " . htmlentities($_COOKIE['font_size']) . ";" ; }
          else {
            print " medium;";
          }
           ?>
        color: <?php if (isset($_COOKIE['font_color']) ) {
          print " #" . htmlentities($_COOKIE['font_color']); }
          else {
            print " #000;";
          } ?>
      }
    </style>
  
  </head>

  <body>
  <p>
      <a href="customize.php">Customize Your Settings</a>
  </p>
  <p>
      <a href="reset.php">Reset Your Settings</a>
  </p>

  <p>Beep boop Beep</p>



  </body>
</html>