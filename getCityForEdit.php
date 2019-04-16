<!DOCTYPE html>
<html>
<head>
    <title> get city</title>

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
</style>
</head>
<?php
include ('connect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
}
    
?>
<form id="edit_city" action="updateCity.php" method="post">
    <div class = "container-fluid">
    <div class="form-group">
    <label for="City">Selected Country</label>
    <select class = "form-control" name = 'COUNTRY_SELECTED' onChange='getCity(this.value);' required>
        <?php 
            $sqlcitycountry = "SELECT * FROM country WHERE COUNTRY_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
            $sqlcitycountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM city WHERE country.COUNTRY_CODE = city.COUNTRY_CODE)";
            $query = $db->query($sqlcitycountry);
            while ($row = $query->fetch_assoc()){
                echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
            }
        ?>
    </select>
    </div>
    
        <div class="form-group">
        <label for="City">Select a City to Edit</label>
        <select class = "form-control" name = 'CITY_SELECTED' onChange='getCityData(this.value);' required>
            
            <?php
            echo "<option value = ''>No city</option>";
            $sqlviewcity="SELECT * FROM city WHERE COUNTRY_CODE='$COUNTRY_SELECTED'";
            $query = $db->query($sqlviewcity);// or die("Failure, no country selected");
            if ($db->query($sqlviewcity)){
    	        while ($row = $query->fetch_assoc()){
                    echo "<option value='" . $row['ID']."'>".$row['CITY_NAME']."</option>";
                }
            }else{
                echo "<option value = ''>No city</option>";
            }  
            ?>
            </select>
        </div>
        </div> 


    <div id = 'edit_city_data' class="row">
    </div>
  

</form>
</html>