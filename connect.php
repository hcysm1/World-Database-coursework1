<?php
// to connect with the database
$db = new mysqli("localhost","root","","world");
mysqli_set_charset($db, "utf8");
if($db->connect_error)
{
	echo "error: ".$db->connect_error;//check whether it is connected or not
	
}

