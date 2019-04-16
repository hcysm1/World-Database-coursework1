<!DOCTYPE html>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CITY_SELECTED= $_POST['CITY_SELECTED'];
}  
?>
<html>
<head>
    <title>city</title>

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
  margin-left: 25px;
  margin-right: 25px;
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
<body>
<div class = "container-fluid">
<div class="form-group">
<label for ="district">City Name:</label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where ID='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='text' id='cityname' name='NEW_CITY_NAME' placeholder='enter characters only' value = '".$row['CITY_NAME']."' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>
        
        <div class="form-group">
        <label for="newcountry">New Country:</label>
            <?php 
            $sqlgetoricountry = "SELECT * FROM country WHERE COUNTRY_CODE=(SELECT COUNTRY_CODE FROM city where ID='$CITY_SELECTED')";
            $query = $db->query($sqlgetoricountry);
            
            ?>
            <select class = "form-control" name = 'NEW_COUNTRY_CODE' required>
            <?php
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
            ?>
            <?php 
            $sqlcountries = "SELECT * FROM country";
            $query = $db->query($sqlcountries);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
            ?>
            </select>
        </div>
    
            <div class="form-group">
            <label for ="district">District: </label>
            <?php
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='text' id='district' name='NEW_DISTRICT' placeholder='enter characters only' value = '".$row['DISTRICT']."' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>


        <div class="form-group">
        <label for ="population">Population :</label>
            <?php
            $sqlgetcitydata="SELECT * FROM city where ID='$CITY_SELECTED'";
            $query = $db->query($sqlgetcitydata);
            while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' value = '".$row['POPULATION']."' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>";
            }
            ?>
        </div>
        </div>
    
    <input type="submit" value="Enter">
    <input type="reset">

    </body>
    </html>