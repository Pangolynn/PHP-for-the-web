<?php

/*
  Homepage displays most recent quote, or a random quote, or a random favorite quote
*/

include('templates/header.html');

include('../mysqli_connect.php');

if(isset($_GET['random'])) {
  $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY RAND() DESC LIMIT 1';
} elseif (isset($_GET['favorite'])) {
  $query = 'SELECT id, quote, source, favorite FROM quotes 
  WHERE favorite=1 ORDER BY RAND() DESC LIMIT 1';
} else {
  $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC LIMIT 1';
}

if ($result = mysqli_query($dbc, $query)) {
  $row = mysqli_fetch_array($result);

  print "<div><blockquote>{$row['quote']}</blockquote>- {$row['source']}";

  if ($row['favorite'] == 1) {
    print ' <strong>Favorite!</strong>';
  }

  print '</div>';

  if (is_administrator()) {
    print "<p><b>Quote Admin:</b>
    <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> <->
    <a href=\"delete_quote.php?id={$row['id']}\">Delete</a>
    </p>\n";
  }
} else {
  print '<p class="error">Could not retrieve data.<br>'
  . mysqli_error($dbc) . '</p><p>Query being run was: ' . $query . '</p>';
}

mysqli_close($dbc);

print '<p>
  <a href="index.php">Latest</a> <-> 
  <a href="index.php?random=true">Random</a> <-> 
  <a href="index.php?favorite=true">Favorite</a>
</p>';

include('templates/footer.html');
?>