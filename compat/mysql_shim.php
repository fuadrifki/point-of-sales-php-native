<?php
// Shim mysql_* (PHP5) -> mysqli for running legacy ProjectPos on PHP 8
$GLOBALS['_mysql_conn'] = null;
if (!function_exists('mysql_connect')) {
  function mysql_connect($host = 'localhost', $user = 'root', $pass = '') {
    $c = mysqli_connect($host, $user, (string)$pass);
    $GLOBALS['_mysql_conn'] = $c;
    return $c;
  }
  function mysql_select_db($db, $link = null) {
    $link = $link ?: $GLOBALS['_mysql_conn'];
    return mysqli_select_db($link, $db);
  }
  function mysql_query($q, $link = null) {
    $link = $link ?: $GLOBALS['_mysql_conn'];
    return mysqli_query($link, $q);
  }
  function mysql_fetch_array($r) { return $r ? mysqli_fetch_array($r) : false; }
  function mysql_num_rows($r) { return $r ? mysqli_num_rows($r) : 0; }
  function mysql_error($link = null) {
    $link = $link ?: $GLOBALS['_mysql_conn'];
    return $link ? mysqli_error($link) : '';
  }
  function mysql_close($link = null) {
    $link = $link ?: $GLOBALS['_mysql_conn'];
    return $link ? mysqli_close($link) : false;
  }
}
