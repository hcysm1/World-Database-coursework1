<html>
<?php

include ("connect.php");
$v = $_POST["COUNTRY_CODE"];
$query = "SELECT DISTINCT DISTRICT FROM city WHERE COUNTRY_CODE = '$v'";
$result = $db->query($query);
?>
<option >Select District</option>

<?php

while ($rs=$result-> fetch_assoc())
{
?>
<option  value = "<?php echo $rs ['DISTRICT']; ?>"> <?php echo $rs ["DISTRICT"]; ?></option>
<?php
}
?>

	
</html>