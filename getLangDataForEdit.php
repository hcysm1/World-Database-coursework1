<!DOCTYPE html>
<html>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
}
?>
<head>
    <title>language</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
input[type=submit] {
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
input[type=reset] {
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



</style>
</head>


<form id="edit_lang" action="updateLang.php" method="post">
               <div class = "container-fluid">
               <div class="form-group">
               <label> Country Selected: </label>

    <select class="form-control" name = 'COUNTRY_SELECTED' onChange='getLang(this.value);' required>
        <?php 
            $sqllangcountry = "SELECT * FROM country WHERE COUNTRY_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqllangcountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
            $sqlcitycountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM lang WHERE country.COUNTRY_CODE = lang.COUNTRY_CODE)";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
        ?>
    </select>
    </div>
    </div>

    
<div class = "container-fluid">
<div class="form-group">

<table class="table table-hover table-dark">
<tr>
<th>Language Name</th>
<th>Official Language?</th>
<th>Percentage of Population</th>
</tr>

<?php
$fetchlangdata="SELECT * FROM lang WHERE COUNTRY_CODE='$COUNTRY_SELECTED'";
$query = $db->query($fetchlangdata);
while ($row = $query->fetch_assoc())
{
    echo "<tr>";
    
    echo "<td>".$row["LANG"]."</td>";
    ?>
    <td>
    <?php
    if($row["OFFICIAL_LANG"]=='T'){
         echo "<label class='radio-inline'>";
         echo "<input  type='radio' value= 'T' name='NEW_OFFICIAL_LANG_".$row["LANG"]."' checked> YES ";
         echo "</label>";

        echo "<label class='radio-inline'>";
        echo "<input type='radio' value= F' name='NEW_OFFICIAL_LANG_".$row["LANG"]."'> NO ";
        echo "</label>";
        
    }else{
            echo "<label class='radio-inline'>";
            echo "<input  type='radio' value= 'T' name='NEW_OFFICIAL_LANG_".$row["LANG"]."'> YES ";
            echo "</label>";
    

        echo "<label class='radio-inline'>";
        echo "<input  type='radio' value= 'F' class='custom-control-input' id='defaultUncheckedDisabled2' name='NEW_OFFICIAL_LANG_".$row["LANG"]."' checked > NO ";
        echo "</label>";
    }
    
    ?>
    </td>
  
<?php
//echo "<td>".$row["OFFICIAL_LANG"]."</td>";
    echo "<td>";
    echo "<input class = 'form-control' type='number' id='percentage' name='NEW_PERCENTAGE".$row["LANG"]."' value = '" .$row["PERCENTAGE"]."' placeholder='enter numbers only' min = '0' max='100' required ondrop='return false' onpaste='return false' step = 0.1>";
    echo"</td>";

    echo "</tr>";
}
?>
</table>
</div>
</div>


    <input type="submit" value="Enter">
    <input type="reset">





</form>
</body>
</html>