<html>
<?php
include ("connect.php");
include ("header.php");
$CONTINENT = $_POST["CONTINENT"];
$sql = "SELECT * FROM country WHERE CONTINENT = '$CONTINENT'";
$query = $db->query($sql);
?>
<head>

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

<body>



<div class = "container-fluid">
<div class="table-responsive-sm" style="overflow-x:auto;">

<table class="table table-hover table-dark">


<tr>
<th>Country Code</th>	
<th>Country Name</th>
<th>Time Zone</th>
<th>Surface Area</th>
<th>Year Independence</th>
<th>Country Population</th>
<th>Life Expectency</th>
<th>GNP</th>
<th>Political System</th>
<th>Capital</th>
<th>ISO 3166</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row["COUNTRY_CODE"]."</td>";
  echo "<td>".$row["COUNTRY_NAME"]."</td>";
  echo "<td>".$row["TIME_ZONE"]."</td>";
  echo "<td>".$row["SURFACE_AREA"]."</td>";
  echo "<td>".$row["YEAR_INDEPENDENCE"]."</td>";
	echo "<td>".$row["POPULATION"]."</td>";
	echo "<td>".$row["LIFE_EXPECTENCY"]."</td>";
	echo "<td>".$row["GNP"]."</td>";
	echo "<td>".$row["POLITICAL_SYSTEM"]."</td>";
	echo "<td>".$row["CAPITAL"]."</td>";
	echo "<td>".$row["ISO_3166"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

