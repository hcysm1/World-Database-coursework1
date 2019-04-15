<?php
// to connect with the database
$db = new mysqli("localhost","root","MaLaYsIa261100!","cw1");
mysqli_set_charset($db, "utf8");
if($db->connect_error)
{
	echo "error: ".$db->connect_error;//check whether it is connected or not
	
}

