<?php // Example 26-1: functions.php
  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'csashesi_anthony-kwawu';   // Modify these...
  $dbuser  = 'csashesi_ank16';   // ...variables according
  $dbpass  = 'db!kAgTI';   // ...to your installation

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if ($connection->connect_error) die($connection->connect_error);

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

?>
