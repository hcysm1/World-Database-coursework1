<!DOCTYPE html>
<html>
<?php
include ("header.php");
include ('connect.php');
function strictEmpty($var) {
  // Delete this line if you want space(s) to count as not empty
  $var = trim($var);
  if(isset($var) === true && ($var === ''||$var === NULL))  {
      return NULL;   // It's empty
  }else {
      return $var;  // It's not empty
  }
}
function checkNull($var){//Just in case isNull function not supported anymore
  if ($var==NULL){
    echo "is Null<br>";
    return true;
  }else{
    return false;
  }
}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title></title>
<style>
body
{
   background-image: url(bg1.jpg); 
   background-size: cover;
   background-repeat: no-repeat;

}
.container-fluid 
{
  border-radius: 5px;
  background: rgba(0,134,179,.5);
  padding: 20px;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 20px;

}


</style>

</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CITY_SELECTED= $_POST['CITY_SELECTED'];
    $NEW_COUNTRY_CODE= $_POST['NEW_COUNTRY_CODE'];
    $NEW_CITY_NAME= $_POST['NEW_CITY_NAME'];
    $NEW_POPULATION= $_POST['NEW_POPULATION'];
    $NEW_DISTRICT= $_POST['NEW_DISTRICT'];

    $sqlviewcity = "SELECT * from city WHERE ID= '$CITY_SELECTED'";
      $sqlupdatecity = "UPDATE city 
      SET `POPULATION`='$NEW_POPULATION', COUNTRY_CODE='$NEW_COUNTRY_CODE', CITY_NAME='$NEW_CITY_NAME',
      DISTRICT='$NEW_DISTRICT' WHERE ID= '$CITY_SELECTED'";
      $queryupdate = $db->query($sqlupdatecity);
      if ($db->query($sqlupdatecity)){
      }else{
        echo "failure";
      }
      echo "<br>";
      
      $queryview = $db->query($sqlviewcity);
    }
    echo"<br>";
    
?>
<div class = "container-fluid">
<div class="table-responsive-sm" style="overflow-x:auto;">

<table class="table table-hover table-dark">
<tr>
<th>ID</th>
<th>Country Code</th>	
<th>City Name</th>
<th>District</th>
<th>Population</th>
</tr>

<?php
while ($row = $queryview->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row["ID"]."</td>";
	echo "<td>".$row["COUNTRY_CODE"]."</td>";
    echo "<td>".$row["CITY_NAME"]."</td>";
    echo "<td>".$row["DISTRICT"]."</td>";
    echo "<td>".$row["POPULATION"]."</td>";
    echo "</tr>";
}


?>
</table>
</div>
</div>
</body>
</html>