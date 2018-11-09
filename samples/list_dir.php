<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Directory Content</title>
</head>
<body>
  <?php

  date_default_timezone_set('America/New_York');

  $search_dir = '.';
  $contents = scandir($search_dir);

  print '<h2>Directories</h2>
    <ul>';
  foreach ($contents as $item) {
    if ( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
      print "<li>$item</li>\n";
    }
  }

  print '</ul>';

  print '<hr><h2>Files</h2>
    <table cellpadding="2" cellspacing="2" align="left">
      <tr>
        <th>Name</th>
        <th>Size</th>
        <th>Last Modified</th>
        <th>File Permissions</th>
        <th>File Owner</th>
      </tr>';

      foreach($contents as $item) {
        if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
          $fs = filesize($search_dir . '/' . $item);

          $lm = date('F j, Y', filemtime($search_dir . '/' . $item));

          $fp = fileperms($search_dir . '/' . $item);

          $fo = fileowner($search_dir . '/' . $item);

          print "<tr>
            <td>$item</td>
            <td>$fs bytes</td>
            <td>$lm</td>
            <td>$fp</td>
            <td>$fo</td>
          </tr>\n";
        }
      }

      print '</table>';

  ?>
</body>
</html>