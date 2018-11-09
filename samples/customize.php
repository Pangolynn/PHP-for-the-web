<?php
if ( isset($_POST['font_size'], $_POST['font_color']) ) {
  // Should actually check if these are acceptable values
  setcookie('font_size', $_POST['font_size'], time()+10000000, '/', '', '0');
  setcookie('font_color', $_POST['font_color'], time()+10000000, '/', '', '0');

  $msg = '<p>Your settings have been entered, now see them. <a href="view_settings">Settings</a></p>';
} ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Customize Your Settings</title>
  </head>

  <body>
    <?php
      if(isset($msg)) {
        print $msg;
      }
    ?>

    <p>Use this form to set your preferences:</p>

    <form action="customize.php" method="post">
      <select name ="font_size">
        <option value="">Font Size</option>
        <option value="xx-small">xx-small</option>
        <option value="x-small">x-small</option>
        <option value="small">small</option>
        <option value="medium">medium</option>
        <option value="large">large</option>
        <option value="x-large">x-large</option>
        <option value="xx-large">xx-large</option>
      </select>
      <select name="font_color">
        <option value="">Font Color</option>
        <option value="999">Gray</option>
        <option value="0C0">Green</option>
        <option value="00f">Blue</option>
        <option value="c00">Red</option>
        <option value="000">Black</option>
      </select>
      
      <input type="submit" value="Set My Preferences" name="submit">
    </form>


  </body>
</html>