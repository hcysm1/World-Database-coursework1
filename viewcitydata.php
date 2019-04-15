<html>
<?php
include ("connect.php");
include ("header.php");
$COUNTRY = $_POST["COUNTRY"];
$sql = "select CITY_NAME,DISTRICT,city.POPULATION from city INNER JOIN country on city.COUNTRY_CODE = country.COUNTRY_CODE where country.country_name = '$COUNTRY' order by city_name";
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
<th>City Name</th>
<th>District</th>
<th>Population</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
  echo "<tr>";
  echo "<td>".$row["CITY_NAME"]."</td>";
  echo "<td>".$row["DISTRICT"]."</td>";
  echo "<td>".$row["POPULATION"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

