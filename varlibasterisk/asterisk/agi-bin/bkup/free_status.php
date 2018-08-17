#!/usr/bin/php
<?php
	include("dbhandeler.php");
       $query = "update master_table set status = 'FREE'";
       $result1 = mysql_query($query) or die(mysql_error());
mysql_close($con);
?>
