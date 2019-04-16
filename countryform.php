<!DOCTYPE html>
<html>
<head>
	<title> country </title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php
include ("header.php");
if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     
  echo "<script type='text/javascript'>alert('your data hasbeen entered successfully!!')</script>";

}
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
<?php
include ("connect.php");
?>
<script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
function gettimezone(val)
{
     $.ajax({
           method :'POST',
           url : 'gettimezone.php',
           data: 'CONTINENT='+val,
           success : function(data)
           {
           	$("#time_zone_list").html(data);
           }
           });
}
</script>

<body>
<form action="country.php" method="post">

<!-- dropdown to select continent from the list -->
      <div class = "container-fluid">
      <div class="form-group">
        
             <label> Select a Continent: </label>
             <select class = "form-control" id = "continent_list" onChange="gettimezone(this.value);" name="CONTINENT" required >
             <option > select continent </option>
             <?php
              $sql = "SELECT DISTINCT CONTINENT FROM country";
              $result = $db->query($sql);
              while ($rs=$result-> fetch_assoc())
              {
              ?>
              <option  value = "<?php echo $rs ['CONTINENT']; ?> "> <?php echo $rs ["CONTINENT"]; ?> </option>
              <?php
               }
              ?>
              </select>
              </div>
      

      <div class="form-group">    
      <label> Select a Timezone: </label>
      <select class = "form-control" id = "time_zone_list" name="TIME_ZONE" required >
      <option>Select Time Zone</option>
      </select>
      </div>



      <div class = "form-group">
      <label for="countrycode">Country Code:</label>
      <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="countrycode" name="COUNTRY_CODE" placeholder="enter 3 characters only.." required maxlength="3"/>
      </div>
   
      <div class = "form-group">
      <label for="countryname">Country Name:</label>
      <input class = "form-control" pattern='[A-Za-z\\s]*' type='text' id="countryname" name="COUNTRY_NAME" placeholder="enter characters only.." required/>
      </div>
   
      <div class = "form-group">
      <label for="surfacearea">Surface Area:</label>
      <input class = "form-control" type="number" id="surfacearea" name="SURFACE_AREA" placeholder="enter numbers only.." required/>
      </div>
      
      <div class = "form-group">
      <label for="yearindipendence">Year Independence:</label>
      <input class = "form-control" type="Year" id="yearindipendence" name="YEAR_INDEPENDENCE" placeholder="enter numbers only" required/>
       </div>

      <div class = "form-group">
      <label for="number">Population:</label>
      <input class = "form-control" type="number" id="population" name="POPULATION" placeholder="enter numbers only" required/>
      </div>

      <div class = "form-group">
      <label for="lifeexpectency">Life Expectency:</label>
      <input class = "form-control" type="number" id="lifeexpectency" step="0.01" name="LIFE_EXPECTENCY" placeholder="enter numbers only.." required/>
      </div>

      <div class = "form-group">
      <label for="gnp">GNP:</label>
      <input class = "form-control" type="number" id="gnp" name="GNP" placeholder="enter numbers only.."required/>
      </div>
      
      <div class = "form-group">
      <label for="gnpold">GNP Old:</label>
      <input class = "form-control" type="number" id="gnpold" name="GNP_OLD" placeholder="enter numbers only.." required/>
      </div>

      <div class = "form-group">
      <label for="localname">Local Name:</label>
      <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="localname" name="LOCAL_NAME" placeholder="enter characters only.." required/>
      </div>
      
      <div class = "form-group">
      <label for="politicalsystem">Political System:</label>
      <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="politicalsystem" name="POLITICAL_SYSTEM" placeholder="enter characters only.." required/>
      </div>
      
      <div class = "form-group">
      <label for="politicalruler">Political Ruler:</label>
      <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="politicalruler" name="POLITICAL_RULER" placeholder="enter characters only.."required/>
      </div>

      <div class = "form-group">
      <label for="capital">Capital ID:</label>
      <input class = "form-control" type="number" id="capital" name="CAPITAL" placeholder="enter numbers only" required/>
      </div>

      <div class = "form-group">
      <label for="iso3166">ISO 3166:</label> 
      <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="iso3166" name="ISO_3166" placeholder="enter 2 characters only.."required maxlength="2"/>
      </div>
      </div>
    
      
      <input type="Submit"  value = "ENTER">

     
      

</form>
</body>
</html>