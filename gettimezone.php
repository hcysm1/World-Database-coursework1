<html>
<?php

include ("connect.php");
$c = $_POST["CONTINENT"];
$query = "SELECT DISTINCT TIME_ZONE FROM country WHERE CONTINENT = '$c'";
$result = $db->query($query);
?>
<option >Select Time Zone</option>

<?php

while ($rs=$result->fetch_assoc())
{
?>
<option  value = "<?php echo $rs['TIME_ZONE']; ?>"> <?php echo $rs["TIME_ZONE"]; ?></option>
<?php
}
?>

	
</html>



