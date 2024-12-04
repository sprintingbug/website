<?php
$dbcon = @mysqli_connect('localhost', 'zenperuda', 'zenperuda', 'zenperuda')
OR die('Could not connect to the MYSQL server: ' . mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');

?>