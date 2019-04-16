<!DOCTYPE html>
<html>
<?php
	include ("connect.php");
	include ("header.php");

	if(isset($_GET["country"])){
		$country = $_GET["country"];
	} else {
		$country = NULL;
	}
?>
<head>
	<title>Delete A Language</title>
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
<body onload="ChangeForm();">

	<div id="static-form" style="display:block;">
		<form action="delFormLang.php" method="get">
			<div class = "container-fluid">
				<div class="form-group">
					<label>Country</label></br>
					<select class="form-control" name="country">
						<option value="" disabled selected>Select a country</option>
						<?php
							$sql = "SELECT * FROM country";
							$query = $db->query($sql);

							while($row = $query->fetch_assoc()){
								$CC = $row["COUNTRY_CODE"];
								$CN = $row["COUNTRY_NAME"];
								echo "<option value=\"".$CC."\">".$CN."</option>";
							}
						?>
					</select>

					</br></br>
					<label>Language</label></br>
					<select>
						<option>Please select a country first</option>
					</select>
					</br></br>
					<button type="submit">Select Country</button>
				</div>
			</div>
		</form>
	</div>





	<div id="dynamic-form" style="display:none;">
		<form action="delete.php" method="post">
			<div class = "container-fluid">
				<div class="form-group">
					<label>Country</label></br>
					<select class="form-control" name="COUNTRY_CODE" id="COUNTRY_CODE">
						<?php
							$sql2 = "SELECT COUNTRY_NAME FROM country WHERE COUNTRY_CODE = \"$country\"";
							$query2 = $db->query($sql2);

							while($name = $query2->fetch_assoc()){
								echo "<option value=\"".$country."\">".$name["COUNTRY_NAME"]."</option>";
							}
						?>
					</select>
yEl]V=9=P=Uf
					</br></br>
					<label>Language</label></br>
					<select class="form-control" name="LANG">
						<option value="" disabled selected>Select a language</option>
						<?php
							$sql3 = "SELECT * FROM lang WHERE COUNTRY_CODE = \"$country\"";
							$query3 = $db->query($sql3);
							$flag = 0;

							while($lang = $query3->fetch_assoc()){
								$flag = 1; // Indicates there is a language
								$LANG = $lang["LANG"];
								echo "<option value=\"".$LANG."\">".$LANG."</option>";
							}

							if($flag == 0){
								echo "<option value=\"\" disabled>---No Language---</option>";
							}
						?>
					</select>
					</div>
				</div>
					<button type="submit">Submit</button>
					
					<input class="form-control" type="hidden" name="TABLE" id="TABLE" value="lang"/>
					<input class="form-control" type="hidden" name="LOC" id="LOC" value="delFormLang.php"/>
		
		</form>
	</div>




	<script type="text/javascript">
		function ChangeForm()
		{
			value = "<?php echo $country ?>";
			if(value)
			{
				document.getElementById("static-form").style.display = "none"; //make not visible
				document.getElementById("dynamic-form").style.display = "block"; //make visible
			}
			else
			{
				document.getElementById("static-form").style.display = "block";
				document.getElementById("dynamic-form").style.display = "none";
			}
		}
	</script>

</body>
</html>