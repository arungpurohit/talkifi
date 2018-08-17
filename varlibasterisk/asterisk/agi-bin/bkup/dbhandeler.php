<?php
$host = "localhost";
$username = "root";
$password = "mypass";
$database = "asterisk";
$con = mysql_connect($host,$username,$password);
if (!$con)
   {
    die('Could not connect: ' . mysql_error());
    }
mysql_select_db($database);
?>
