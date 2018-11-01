<?php 

function multiple_return($p1, $p2) {
  return [$p2, $p1];
}

list($v1, $v2) = multiple_return(1, 2);

print $v1 . ' ' . $v2 . "<br>";
$arr = multiple_return(5, 6);
print_r($arr);
print_r(multiple_return(3,4));

foreach($arr as $key => $value) {
  print '<p>Key ' . $key . ' value ' . $value . '</p>';
  print "<p>Key $key Value $value </p>";
}