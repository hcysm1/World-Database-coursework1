<html>
<?php
include ("connect.php");
include ("header.php");
$COUNTRY = $_POST["COUNTRY"];
$sql = "select COUNTRY_NAME,LANG,OFFICIAL_LANG,PERCENTAGE from lang INNER JOIN country on lang.COUNTRY_CODE = country.COUNTRY_CODE where country.country_name = '$COUNTRY' order by country_name";
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
<th>Country Name</th>
<th>Language</th>
<th>Official?</th>
<th>Percentage</th>
</tr>

<?php
while ($row = $query->fetch_assoc())
{
  echo "<tr>";
  echo "<td>".$row["COUNTRY_NAME"]."</td>";
  echo "<td>".$row["LANG"]."</td>";
  echo "<td>".$row["OFFICIAL_LANG"]."</td>";
  echo "<td>".$row["PERCENTAGE"]."</td>";
}
?>

</table>
</div>
</div>

</body>
</html>

