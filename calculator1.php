<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cost Calculator</title>
  </head>

  <body>
  <?php
    function calculate_total($quantity, $price) {
      $total = $quantity * $price;
      $total = number_format($total, 2);

      return $total;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if( is_numeric($_POST['quantity']) AND is_numeric($_POST['price']) ) {
        $total = calculate_total($_POST['quantity'], $_POST['price']);
        print "<p>Your total is $<span style=\"font-weight: bold;\">$total</span>.</p>";
      } else {
        print '<p style="color: red;">Please enter a valid quantity and price!</p>';
      }
    }
  ?>

  <form action="" method="post">
    <p>Quantity: <input type="text" name="quantity" size="3"></p>
    <p>Price: <input type="text" name="price" size="5"></p>
    <input type="submit" name="submit" value="Calculate">
  </form>
  </body>
</html>