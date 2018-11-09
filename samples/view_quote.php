<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
  View a Quotation
  </title>
</head>
<body>
  <?php
    $data = file('../quotes.txt');

    $n = count($data);
    $rand = rand(0, ($n - 1));

    print '<p>' . trim($data[$rand]) . '</p>';
  ?>
</body>
</html>