
<html>
<?php
include ("connect.php");
include ("header.php");
$resultSet = $db->query("SELECT DISTINCT CONTINENT FROM country");
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
</style>
</head>
<body>

<form action="viewcountrydata.php" method="POST">
  <div class = "container-fluid">
  <div class="form-group">
  <label> Select a Continent: </label>

<select class="form-control"  name="CONTINENT">
<?php
while ($row = $resultSet->fetch_assoc())
{
	$CONTINENT = $row['CONTINENT'];
	echo "<option value='$CONTINENT'>".$CONTINENT."</option>";
}
?>
</select>
</div>



<input type="submit">
</form>
</body>
</html>