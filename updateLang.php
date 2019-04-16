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
table {
  border-collapse: collapse;
  width: 100%;
  }

th
{
text-align: left;
  padding: 8px;

}


td {
  text-align: left;
  padding: 8px;

  
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
<title></title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    echo "<br>";
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
        echo "<br>";
        $queryupdate = $db->query($sqlupdatecity);
        if ($db->query($sqlupdatecity)){
          echo "Successfully updated ".$LANG_CHANGED;
        }else{
          echo "Failure to update".$LANG_CHANGED;
        }
        echo "<br>";
  }
    }else{
      echo "failure";
      }
      
      $queryview = $db->query($sqlviewlang);
    }
    echo"<br>";
    
?>
<div style="overflow-x:auto;">
<table>
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
</body>
</html>