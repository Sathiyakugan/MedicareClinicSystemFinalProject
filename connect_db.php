<?php

error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
$con=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', ''))or die("cannot connect to server");
mysqli_select_db($GLOBALS["___mysqli_ston"], pharmacy)or die("cannot connect to database");

?>