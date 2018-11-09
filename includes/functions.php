<?php

// Check if the user is an admin
// Params: 2 optional values
// Return: boolean
function is_administrator($name = 'Samuel', $value="Clemens") {
  if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
    return true;
  } else {
    return false;
  }
}