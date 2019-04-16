<!DOCTYPE html>
<html>
<head>
  <title> edit city</title>

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

</style>
</head>
<?php
include ("header.php");
include ("connect.php");
?>
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
function getCity(val)
{
     $.ajax({
           method :"POST",
           url : "getCityForEdit.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_city").html(data);
           }
           });
}
</script>

<script>
function getCityData(val)
{
     $.ajax({
           method :"POST",
           url : "getCityDataForEdit.php",
           data: 'CITY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_city_data").html(data);
           }
           });
}
</script>


<body>
<div style="overflow-x:auto;">
    

<form id="edit_city" action="updateCity.php" method="post">
   <div class = "container-fluid">
   <div class="form-group">
   <label> Select a Country: </label>
    <select class = "form-control"  name = 'COUNTRY_SELECTED' onChange='getCity(this.value);' required>
        <option value = '' >Choose origin country</option>
        <?php 
            $sqlcitycountry = "SELECT * FROM country WHERE EXISTS (SELECT * FROM city WHERE country.COUNTRY_CODE = city.COUNTRY_CODE)";
            $query = $db->query($sqlcitycountry);
        while ($row = $query->fetch_assoc()){
        echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
        }
        ?>
    </select>
    </div>
  </div>

</form>
</body>
</html>