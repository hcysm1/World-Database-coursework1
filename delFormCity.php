<!DOCTYPE html>
<html>
<?php
	include ("connect.php");
	include ("header.php");
	$sql = "SELECT city.ID, city.CITY_NAME, country.COUNTRY_NAME FROM city LEFT JOIN country ON city.COUNTRY_CODE = country.COUNTRY_CODE ORDER BY country.COUNTRY_NAME";
	$query = $db->query($sql);
?>
<head>
	<title>Delete A City</title>
	<meta charset="UTF-8"/>

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
	button[type=submit] {
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
	<form action="delete.php" method="post">
		<div class = "container-fluid">
			<div class="form-group">
				<label>Delete a City from the Database</label></br>
				<select class="form-control" name="ID">
					<option value="" disabled selected>Select a city</option>
					<?php
						$past = NULL;
						while($row = $query->fetch_assoc()){
							$CoName = $row["COUNTRY_NAME"];
							$CiName = $row["CITY_NAME"];
							$CiID = $row["ID"];

							if($CoName != $past){
								if($past != NULL){
									echo "</optgroup>";
								}
								echo "<optgroup label=\"".$CoName."\">";
							}
							echo "<option value=\"".$CiID."\">".$CiName."</option>";

							$past = $CoName;
						}
						echo "</optgroup>";
					?>
				</select>
			</div>
		</div>
				<button type="submit">Submit</button>

				<input class="form-control" type="hidden" name="TABLE" id="TABLE" value="city"/>
				<input class="form-control" type="hidden" name="LOC" id="LOC" value="delFormCity.php"/>
			
	</form>

</body>
</html>