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
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    $sqlviewlang = "SELECT * from lang WHERE COUNTRY_CODE= '$COUNTRY_SELECTED'";
    $queryview = $db->query($sqlviewlang);// or die("Failure, no country selected");
    if ($db->query($sqlviewlang)){
      while ($row = $queryview->fetch_assoc()){
            $LANG_SELECTED[$row['LANG']]=$row['LANG'];
            $NEW_OFFICIAL_LANG[$row['LANG']]=$_POST['NEW_OFFICIAL_LANG_'.$row["LANG"].''];
            $NEW_PERCENTAGE[$row['LANG']]=$_POST['NEW_PERCENTAGE'.$row["LANG"].''];
  }
    }else{
      echo "failure";
      }
      $queryview = $db->query($sqlviewlang);// or die("Failure, no country selected");
    if ($db->query($sqlviewlang)){
      while ($row = $queryview->fetch_assoc()){
        $LANG_CHANGED=$row['LANG'];
        $OFFICIAL_LANG_IN=$NEW_OFFICIAL_LANG[$row['LANG']];
        $PERCENTAGE_IN=$NEW_PERCENTAGE[$row['LANG']];
        $sqlupdatecity = "UPDATE lang SET `OFFICIAL_LANG`='$OFFICIAL_LANG_IN', `PERCENTAGE`='$PERCENTAGE_IN' WHERE COUNTRY_CODE='$COUNTRY_SELECTED'AND LANG ='$LANG_CHANGED'";
        $queryupdate = $db->query($sqlupdatecity);
        if ($db->query($sqlupdatecity)){
        }else{
          echo "Failure to update".$LANG_CHANGED;
        }
  }
    }else{
      echo "failure";
      }
      
      $queryview = $db->query($sqlviewlang);
    }
    
?>
<div class = "container-fluid">
<div class="table-responsive-sm" style="overflow-x:auto;">
<table class="table table-hover table-dark">
<tr>
<th>Country Code</th>	
<th>Language</th>
<th>Is it an official language</th>
<th>Percentage</th>
</tr>

<?php
while ($row = $queryview->fetch_assoc())
{
    echo "<tr>";
	echo "<td>".$row["COUNTRY_CODE"]."</td>";
    echo "<td>".$row["LANG"]."</td>";
    echo "<td>".$row["OFFICIAL_LANG"]."</td>";
    echo "<td>".$row["PERCENTAGE"]."</td>";
    echo "</tr>";
}


?>
</table>
</div>
</div>
</body>
</html>