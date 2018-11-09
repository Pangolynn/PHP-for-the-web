<?php
  define('TITLE', 'View All Quotes');
  include('templates/header.html');

  print '<h2>All Quotes</h2>';

  if (!is_administrator()) {
    print '<p class="error">Access Denied.</p>';

    include('templates/footer.html');

    exit();
  }

  include('../mysqli_connect.php');
  $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';

  if ($r = mysqli_query($dbc, $query)) {
    while ($row = mysqli_fetch_array($r)) {
      print "<div>
      <blockquote>{$row['quote']}</blockquote>- {$row['source']}\n";
      
      if ($row['favorite'] == 1) {
        print ' <strong>Favorite!</strong>';
      }

      print "<p><b>Quote Admin:</b> 
        <a href=\"edit_quote.php?id={$row['id']}\">Edit</a><->
        <a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p>
      
      </div>\n";
    }

  } else { // Query failed
    print '<p class="error">Could not retrieve data.<br>' . mysqli_error($dbc) 
    . '.</p><p>The query being run was' . $query . '</p>';
  }

  mysqli_close($dbc);

  include('templates/footer.html');

  ?>