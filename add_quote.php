<?php

  define('TITLE', 'Add a Quote');
  include('templates/header.html');

  print '<h2>Add a Quotation</h2>';

  if(!is_administrator()) {
    print '<p class="error">You do not have permission to access this page.</p>';
    include('templates/footer.html');

    exit();
  } 

  // Check for form submission
  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {
      include('../mysqli_connect.php');

      $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])));
      $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])));

      // Create the favorite flag
      if (isset($_POST['favorite'])) {
        $favorite = 1;
      } else {
        $favorite = 0;
      }

      $query = "INSERT INTO quotes (quote, source, favorite) VALUES ('$quote', '$source', $favorite)";
      mysqli_query($dbc, $query);

      if (mysqli_affected_rows($dbc) == 1) {
        print '<p>Your quote has been stored.</p>';
      } else { // This level of error reporting should not be used for live purposes - only debugging
        print '<p class="error">Your quote could not be stored because:<br>' . mysqli_error($dbc) 
        . '.</p><p>The query being run was: ' . $query . '</p>';
      }

      mysqli_close($dbc);

    } else { // Blank quotation
      print '<p class="error">Please enter a quotation and source.</p>';
    }
    
  }
  ?>

  <form action="add_quote.php" method="post">
    <p><label>Quote <textarea name="quote" rows="5" cols="30"></textarea></label></p>
    <p><label>Author <input type="text" name="source"></label></p>
    <p><label>Is this a favorite?<input type="checkbox" name="favorite" value="yes"></label></p>
    <p><input type="submit" name="submit" value="Submit Quote"></p>
  </form>

  <?php include('templates/footer.html'); ?>