#!/usr/bin/php
<?php
//        include_once("phpagi-2.20/phpagi.php");
  //      $agi = new AGI();

$host = "localhost";
$username = 'root';
$password = 'mypass';
$database = 'asterisk';

        $con = mysql_connect($host,$username,$password);
        if (!$con)
        {
                die('Could not connect: ' . mysql_error());
        }

        mysql_select_db($database);


                $query = "update master_table set status = 'FREE'";
                $result1 = mysql_query($query) or die(mysql_error());


mysql_close($con);
?>
