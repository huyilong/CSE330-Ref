<?php

//build connection to databse
//here the last item is the name of database not the table name!!!!
//show create use to switch all these things together

//mysql> show create table courses;
$mysqli = new mysqli('localhost', 'hu.yilong', 'hylwustl2014', 'nameOfDataBase');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>