<?php

// Superglobals are special built-in variables in PHP, that are available from any function, class, or file without previous declaration of them as global variables.

// What that practically means is that there is no need to use the  global keyword to access them.

// Bellow is how we can access a global variable from a function:

$x = 10;
$y = 2;

function subtract() {
  global $x, $y;
  return $x - $y;
}

echo subtract(); // 8

// Superglobals do not need the global keyword
{
  session_start();
  /*session is started if you don't write this line can't use $_Session  global variable*/

  $_SESSION["newsession"]= 1.1;

  function get_session() {

  // no need for the global keyword
  return $_SESSION["newsession"];
  }

  echo get_session(); // 1.1
}