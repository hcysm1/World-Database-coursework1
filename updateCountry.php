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
input[type=submit]
 {
  background: rgba(0,134,179,.9);
  color: black;
  padding: 12px 20px;
  border: 2px solid #000000;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-weight: bold;
  width: 200px;
  margin-top: 4px;
  font-size: 20px;
  margin-right: 17px;
  margin-bottom: 4px;
}
.form-group
{
  font-family: "Trebuchet MS", Helvetica, sans-serif;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title></title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    $NEW_COUNTRY_CODE= $_POST['NEW_COUNTRY_CODE'];
    $NEW_COUNTRY_NAME= $_POST['NEW_COUNTRY_NAME'];
    $NEW_CONTINENT_SELECTED= $_POST['NEW_CONTINENT_SELECTED'];
    $NEW_TIME_ZONE_SELECTED= $_POST['NEW_TIME_ZONE_SELECTED'];
    $NEW_SURFACE_AREA= $_POST['NEW_SURFACE_AREA'];
    $NEW_YEAR_INDEPENDENCE= $_POST['NEW_YEAR_INDEPENDENCE'];
    $NEW_YEAR_INDEPENDENCE= strictEmpty($NEW_YEAR_INDEPENDENCE);
    $NEW_POPULATION= $_POST['NEW_POPULATION'];
    $NEW_LIFE_EXPECTENCY= $_POST['NEW_LIFE_EXPECTENCY'];
    $NEW_GNP= $_POST['NEW_GNP'];
    $NEW_GNP_OLD= $_POST['NEW_GNP_OLD'];
    $NEW_LOCAL_NAME= $_POST['NEW_LOCAL_NAME'];
    $NEW_POLITICAL_SYSTEM= $_POST['NEW_POLITICAL_SYSTEM'];
    $NEW_POLITICAL_RULER= $_POST['NEW_POLITICAL_RULER'];
    $NEW_CAPITAL= $_POST['NEW_CAPITAL'];
    $NEW_CAPITAL= strictEmpty($NEW_CAPITAL);
    $NEW_ISO_3166= $_POST['NEW_ISO_3166'];

    $sqlviewcountry = "SELECT * from country where COUNTRY_CODE= '$COUNTRY_SELECTED'";
    $queryview = $db->query($sqlviewcountry);// or die("Failure, no country selected");
    if ($db->query($sqlviewcountry)){
      while ($row = $queryview->fetch_assoc()){
  }
    }else{
      echo "failure";
      }
      $sqlupdatecountry = "UPDATE country 
      SET COUNTRY_NAME='$NEW_COUNTRY_NAME', CONTINENT='$NEW_CONTINENT_SELECTED', TIME_ZONE='$NEW_TIME_ZONE_SELECTED', SURFACE_AREA='$NEW_SURFACE_AREA',`POPULATION`='$NEW_POPULATION', 
      LIFE_EXPECTENCY='$NEW_LIFE_EXPECTENCY', GNP='$NEW_GNP', GNP_OLD='$NEW_GNP_OLD', LOCAL_NAME='$NEW_LOCAL_NAME', POLITICAL_SYSTEM='$NEW_POLITICAL_SYSTEM',
      POLITICAL_RULER='$NEW_POLITICAL_RULER', ISO_3166='$NEW_ISO_3166' WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
        echo "Successfully updated";
      }else{
        echo "failure";
      }
      echo "<br>";
      if(checkNull($NEW_YEAR_INDEPENDENCE)){
        $sqlupdatecountry="UPDATE country SET YEAR_INDEPENDENCE=NULL WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
      }else{
        $sqlupdatecountry="UPDATE country SET YEAR_INDEPENDENCE='$NEW_YEAR_INDEPENDENCE' WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
      }
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
      }else{
        echo "Error in year update";
      }
      echo"<br>";
      if(checkNull($NEW_CAPITAL)){
        $sqlupdatecountry = "UPDATE country SET CAPITAL=NULL WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
      }else{
        $sqlupdatecountry = "UPDATE country SET CAPITAL='$NEW_CAPITAL' WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
      }
      $queryupdate = $db->query($sqlupdatecountry);
      if ($db->query($sqlupdatecountry)){
      }else{
        echo "Sorry, capital doen't exist";
      }
      
      $sqlupdatecountry = "UPDATE country SET COUNTRY_CODE='$NEW_COUNTRY_CODE' WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
    $queryupdate = $db->query($sqlupdatecountry);
    if ($db->query($sqlupdatecountry)){
    }else{
      echo "Sorry, country code already exists, please try again with a UNIQUE set of characters";
      $sqlviewcountry = "SELECT * from country where COUNTRY_CODE= '$COUNTRY_SELECTED'";
      $queryupdate = $db->query($sqlviewcountry);
      while ($row = $queryupdate->fetch_assoc()){
        $NEW_COUNTRY_CODE=$row['COUNTRY_CODE'];// Just in case, to access the table for updated contents
      }
    }
    
    }
?>
<div class = "container-fluid">
<div class="table-responsive-sm" style="overflow-x:auto;">
<table class="table table-hover table-dark">
<tr>
<th>Country Code</th>	
<th>Country Name</th>
<th>Continent</th>
<th>Time Zone</th>
<th>Surface Area</th>
<th>Year of Independence/Establishment</th>
<th>Population</th>
<th>Life Expectancy</th>
<th>GNP</th>
<th>GNP Old</th>
<th>Local Name</th>
<th>Politica System</th>
<th>Political Ruler</th>
<th>Capital's ID</th>
<th>ISO_3166</th>
</tr>

<?php
$sqlviewcountry = "SELECT * from country where COUNTRY_CODE= '$NEW_COUNTRY_CODE'"; //just in case the country sucessfully
$queryview = $db->query($sqlviewcountry);
while ($row = $queryview->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["COUNTRY_CODE"]."</td>";
    echo "<td>".$row["COUNTRY_NAME"]."</td>";
    echo "<td>".$row["CONTINENT"]."</td>";
    echo "<td>".$row["TIME_ZONE"]."</td>";
    echo "<td>".$row["SURFACE_AREA"]."</td>";
    echo "<td>".$row["YEAR_INDEPENDENCE"]."</td>";
    echo "<td>".$row["POPULATION"]."</td>";
    echo "<td>".$row["LIFE_EXPECTENCY"]."</td>";
    echo "<td>".$row["GNP"]."</td>";
    echo "<td>".$row["GNP_OLD"]."</td>";
    echo "<td>".$row["LOCAL_NAME"]."</td>";
    echo "<td>".$row["POLITICAL_SYSTEM"]."</td>";
    echo "<td>".$row["POLITICAL_RULER"]."</td>";
    echo "<td>".$row["CAPITAL"]."</td>";
    echo "<td>".$row["ISO_3166"]."</td>";
    echo "</tr>";
}


?>
</table>
</div>
</div>
</body>
</html>