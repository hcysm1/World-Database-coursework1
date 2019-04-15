<!DOCTYPE html>
<html>
<head>
<?php
include ('connect.php');
?>
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
    input[type=submit]
     {
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
    input[type=reset]
     {
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
    .form-group
    {
      font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    
    
    </style>
    
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $COUNTRY_SELECTED= $_POST['COUNTRY_SELECTED'];
    $sqlviewcountry = "SELECT * from country where COUNTRY_CODE= '$COUNTRY_SELECTED'";
    $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
    if ($db->query($sqlviewcountry)){
		while ($row = $query->fetch_assoc()){
            //echo $row['COUNTRY_NAME'];
}
	}else{
		echo "failure".mysqli_error($db);
    }
}
    
?>
<form id="edit_country" action="updateCountry.php" method="post">
<div class = "container-fluid">
    <div class="form-group">
    <label> Select a Country: </label>
    <select class = "form-control" name = 'COUNTRY_SELECTED' onChange='getCountry(this.value);' required>
    <?php 
    $query = $db->query($sqlviewcountry);
    while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
    {
    	echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
    }
    ?>
    <?php
    $sqlall = "SELECT * FROM country";
    $sqlallbut ="SELECT * FROM country WHERE NOT COUNTRY_CODE='$COUNTRY_SELECTED'";
    $query = $db->query($sqlallbut);
    while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
    {
    	echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
    }
?>
    </select>
    </div>

    <div class="form-group">
        <label for="countrycode">Country Code</label>
        <?php
        $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
        if ($db->query($sqlviewcountry)){
		    while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_COUNTRY_CODE' value = '" . $row['COUNTRY_CODE']."' placeholder='enter 3 characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>";
            }
        }else{
        echo "<input class = 'form-control' pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_COUNTRY_CODE' placeholder='enter 3 characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>";
        }
        ?>
    </div> 

    <div class="form-group">
        <label for="countryname">Country Name</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='text' id='countryname' name='NEW_COUNTRY_NAME' value = '" . $row['COUNTRY_NAME']."' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class = 'form-control' type='text' id='countryname' name='NEW_COUNTRY_NAME' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>

    <div class="form-group">
        <label for="continent">Continent</label>
            <?php 
            $sqlviewcontinent = "SELECT DISTINCT CONTINENT FROM country";
            echo "<select class = 'form-control' name = 'NEW_CONTINENT_SELECTED' required>";
            $query = $db->query($sqlviewcountry);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['CONTINENT']."'>" . $row ['CONTINENT']."</option>";
            }
            $query = $db->query($sqlviewcontinent);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['CONTINENT']."'>" . $row ['CONTINENT']."</option>";
            }
            echo "</select>";
            ?>
    </div>
    
    <div class="form-group">
        <label for="timezone">Time Zone</label>
        <?php 
            $sqlviewtime = "SELECT DISTINCT TIME_ZONE FROM country";
            echo "<select class = 'form-control' name = 'NEW_TIME_ZONE_SELECTED' required>";
            $query = $db->query($sqlviewcountry);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['TIME_ZONE']."'>" . $row ['TIME_ZONE']."</option>";
            }
            $query = $db->query($sqlviewtime);
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['TIME_ZONE']."'>" . $row ['TIME_ZONE']."</option>";
            }
            echo "</select>";
            ?>
    </div>

    <div class="form-group">
        <label for="surfacearea">Surface Area</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='number' id='surfacearea' name='NEW_SURFACE_AREA' value = '" . $row['SURFACE_AREA']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class = 'form-control' type='number' id='surfacearea' name='NEW_SURFACE_AREA' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="form-group">
        <label for="yearindipendence">Year Independence</label>
        <?php
        $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
        if ($db->query($sqlviewcountry)){
		    while ($row = $query->fetch_assoc()){
                echo "<input class = 'form-control' type='number' id='yearindipendence' name='NEW_YEAR_INDEPENDENCE' value = '" . $row['YEAR_INDEPENDENCE']."' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>";
            }
        }else{
            echo "<input class = 'form-control' type='number' id='yearindipendence' name='NEW_YEAR_INDEPENDENCE' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>";
        }
        ?>
    </div>

    <div class="form-group">
        <label for="number">Population</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='number' id='population' name='NEW_POPULATION' value = '" . $row['POPULATION']."' placeholder='enter numbers only' min = '0' required maxlength='11' ondrop='return false' onpaste='return false'>";
                }
            }else{
                echo "<input class = 'form-control' type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>";
            }  
        ?>
    </div>

    <div class="form-group">
        <label for="lifeexpectency">Life Expectency</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' value = '" . $row['LIFE_EXPECTENCY']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>";
                }
            }else{
                echo "<input class = 'form-control' type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>";
            }  
            ?>
    </div>

    <div class="form-group">
        <label for="gnp">GNP</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='number' id='gnp' name='NEW_GNP' value = '" . $row['GNP']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class = 'form-control' type='number' id='gnp' name='NEW_GNP' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="form-group">
        <label for="gnpold">Old GNP</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='number' id='gnpold' name='NEW_GNP_OLD' value = '" . $row['GNP_OLD']."' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
                }
            }else{
                echo "<input class = 'form-control' type='number' id='gnpold' name='NEW_GNP_OLD' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>";
            }  
            ?>
    </div>

    <div class="form-group">
        <label for="localname">Country Name in local language</label>
            <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='text' id='localname' name='NEW_LOCAL_NAME' value = '" . $row['LOCAL_NAME']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'form-control' type='text' id='localname' name='NEW_LOCAL_NAME' placeholder='enter characters only..' required>";
            }
            ?>
    </div>

    <div class="form-group">
        <label for="politicalsystem">Political System</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='text' id='politicalsystem' name='NEW_POLITICAL_SYSTEM' value = '" . $row['POLITICAL_SYSTEM']."' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class = 'form-control' type='text' id='politicalsystem' name='NEW_POLITICAL_SYSTEM' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>

    <div class="form-group">
        <label for="politicalsystem">Political System</label>
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
    		    while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' type='text' id='politicalruler' name='NEW_POLITICAL_RULER' value = '" . $row['POLITICAL_RULER']."' placeholder='enter characters only..' required>";
                }
            }else{
            echo "<input class = 'form-control' type='text' id='politicalruler' name='NEW_POLITICAL_RULER' placeholder='enter characters only..' required>";
            }
            ?>
    </div>

    <div class="form-group">
        <label for="capital">Capital</label>
            <select class = 'form-control' name = 'NEW_CAPITAL' required>
            <?php
            $sqlgetcapital="SELECT * FROM city WHERE ID=(SELECT CAPITAL from country WHERE COUNTRY_CODE='$COUNTRY_SELECTED')";
            $query = $db->query($sqlgetcapital);
            if ($db->query($sqlgetcapital)){
    	        while ($row = $query->fetch_assoc()){
                    echo "<option value='" . $row['ID']."'>".$row['CITY_NAME']."</option>";
                }
            }else{
                echo "<option value = ''>No city</option>";
            } 
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

    <div class="form-group">
        <label for="iso3166">ISO 3166</label> 
        <?php
            $query = $db->query($sqlviewcountry);// or die("Failure, no country selected");
            if ($db->query($sqlviewcountry)){
		        while ($row = $query->fetch_assoc()){
                    echo "<input class = 'form-control' pattern='[A-Z]*' type='text' id='iso3166' name='NEW_ISO_3166' value = '" . $row['ISO_3166']."' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>";
                }
            }else{
            echo "<input class = 'form-control' pattern='[A-Z]*' type='text' id='iso3166' name='NEW_ISO_3166' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>";
            }
            ?>
    </div>

</div>
<input  type="submit">
<input type="reset">
</form>

</html>