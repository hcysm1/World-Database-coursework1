<html>
<?php
include ("connect.php");
include ("header.php");
$CONTINENT = $_POST["CONTINENT"];
$sql = "SELECT *,country.POPULATION AS COUNTRY_POPULATION,city.POPULATION AS CITY_POPULATION FROM country INNER JOIN city ON country.COUNTRY_CODE = city.COUNTRY_CODE INNER JOIN lang ON country.COUNTRY_CODE = lang.COUNTRY_CODE WHERE CONTINENT = \"$CONTINENT\" AND lang.OFFICIAL_LANG = \"T\"";
$query = $db->query($sql);
?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<th>GNP(Old)</th>
<th>Local Name</th>
<th>Political System</th>
<th>Political Ruler</th>
<th>Capital</th>
<th>ISO 3166</th>
<th>City Name</th>
<th>District</th>
<th>City Population</th>
<th>Main Language</th>
<th>Percentage</th>
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
	echo "<td>".$row["COUNTRY_POPULATION"]."</td>";
	echo "<td>".$row["LIFE_EXPECTENCY"]."</td>";
	echo "<td>".$row["GNP"]."</td>";
	echo "<td>".$row["GNP_OLD"]."</td>";
	echo "<td>".$row["LOCAL_NAME"]."</td>";
	echo "<td>".$row["POLITICAL_SYSTEM"]."</td>";
	echo "<td>".$row["POLITICAL_RULER"]."</td>";
	echo "<td>".$row["CAPITAL"]."</td>";
	echo "<td>".$row["ISO_3166"]."</td>";
	echo "<td>".$row["CITY_NAME"]."</td>";
	echo "<td>".$row["DISTRICT"]."</td>";
	echo "<td>".$row["CITY_POPULATION"]."</td>";
	echo "<td>".$row["LANG"]."</td>";
	echo "<td>".$row["PERCENTAGE"]."</td>";
    echo "</tr>";
}
?>
</table>
</div>
</div>
</body>
</html>