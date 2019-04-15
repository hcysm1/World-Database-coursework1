<!DOCTYPE html>
<html>
<head>
<?php
include ("header.php");
include ("connect.php");
?>
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
function getCountry(val)
{
     $.ajax({
           method :"POST",
           url : "getCountryForEdit.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_country").html(data);
           }
           });
}
</script>
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
<body>
<div style="overflow-x:auto;">


<form id="edit_country" action="updateCountry.php" method="post">
<div class = "container-fluid">
<div class="form-group">
<label> Select a Country: </label>
<select class = "form-control" name = 'COUNTRY_SELECTED' onChange='getCountry(this.value);' required>
<option value = NULL >choose a country</option>
<?php
    $sql = "SELECT * FROM country";
    $query = $db->query($sql);
    while ($row = $query->fetch_assoc()){
    echo "<option value = '" . $row['COUNTRY_CODE']."'>" . $row ['COUNTRY_NAME']."</option>";
    }
?>
    </select>
    </div>
    <div class="form-group">
        <label for="countrycode">Country Code</label>
        <input class = 'form-control' pattern='[A-Z\\s]*' type='text' id='countrycode' name='NEW_COUNTRY_CODE' placeholder='enter 3 upper case characters only..' required maxlength='3' ondrop='return false' onpaste='return false'>
    </div> 

    <div class="form-group">
        <label for="countryname">Country Name</label>
        <input class = 'form-control' type='text' id='countryname' name='NEW_COUNTRY_NAME' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>
    </div>
    
    <div class="form-group">
        <label for="continent">Continent</label>
        
            <?php 
            $sqlviewcontinent = "SELECT DISTINCT CONTINENT FROM country";
            $query = $db->query($sqlviewcontinent);
            ?>
            <select class = 'form-control' name = 'NEW_CONTINENT_SELECTED' required>
            <option value = ''>Choose a continent</option>
            <?php
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
            $query = $db->query($sqlviewtime);
            ?>
            <select class = 'form-control' name = 'NEW_TIME_ZONE_SELECTED' required>
            <option value = ''>Choose a time zone</option>
            <?php
            while ($row = $query->fetch_assoc())//$row = mysql_fetch_assoc($result)
            {
                echo "<option value = '" . $row['TIME_ZONE']."'>" . $row ['TIME_ZONE']."</option>";
            }
            echo "</select>";
            ?>
    </div>

    <div class="form-group">
        <label for="surfacarea">Surface Area</label>
        <input class = 'form-control' type='number' id='surfacearea' name='NEW_SURFACE_AREA' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>
    
    <div class="form-group">
        <label for="yearindipendence">Year Independence</label>
        <input class = 'form-control' type='number' id='yearindipendence' name='NEW_YEAR_INDEPENDENCE' placeholder='enter numbers only' ondrop='return false' onpaste='return false'>
    </div>

    <div class="form-group">
        <label for="number">Population</label>
        <input class = 'form-control' type='number' id='population' name='NEW_POPULATION' placeholder='enter numbers only' min = '0' maxlength='11' required ondrop='return false' onpaste='return false'>
    </div>

    <div class="form-group">
        <label for="lifeexpectency">Life Expectency</label>
        <input class = 'form-control' type='number' id='lifeexpectancy' name='NEW_LIFE_EXPECTENCY' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.01>
    </div>

    <div class="form-group">
        <label for="gnp">GNP</label>
        <input class = 'form-control' type='number' id='gnp' name='NEW_GNP' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>

    <div class="form-group">
        <label for="gnpold">Old GNP</label>
        <input class = 'form-control' type='number' id='gnpold' name='NEW_GNP_OLD' placeholder='enter numbers only' min = '0' required ondrop='return false' onpaste='return false' step = 0.1>
    </div>

    <div class="form-group">
        <label for="localname">Country Name in local language</label>
        <input class = 'form-control' type='text' id='localname' name='NEW_LOCAL_NAME' placeholder='enter characters only..' required>
    </div>

    <div class="form-group">
        <label for="politicalsystem">Political System</label>
        <input class = 'form-control' type='text' id='politicalsystem' name='NEW_POLITICAL_SYSTEM' placeholder='enter characters only..' required ondrop='return false' onpaste='return false'>
    </div>

    <div class="form-group">
        <label for="politicalruler">Political Ruler</label>
        <input class = 'form-control' type='text' id='politicalruler' name='NEW_POLITICAL_RULER' placeholder='enter characters only..' required>
    </div>

    <div class="form-group">
            <label for="capital">Capital</label>
            <select class = 'form-control' name = 'NEW_CAPITAL' required>
                <option value = ''>No city</option>
            </select>
    </div>

    <div class="form-group">
        <label for="iso3166">ISO 3166</label> 
        <input class = 'form-control' pattern='[A-Z]*' type='text' id='iso3166' name='NEW_ISO_3166' placeholder='enter 2 upper case characters only..' maxlength='2' required ondrop='return false' onpaste='return false'>"
    </div>

</div>

<input type="submit">>
<input type="reset">
</form>
</div>

</body>
</html>