<!DOCTYPE html>
<html>
<head>
	<title>city</title>

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
function getDistrict(val)
{
     $.ajax({
           method :"POST",
           url : "getDistrict.php",
           data: 'COUNTRY_CODE='+val,
           success : function(data)
           {
           	$("#district_list").html(data);
           }
           });
}
</script>
<body>

<form action="city.php" method="post">

	             <div class = "container-fluid">
               <div class="form-group">

              <label> Select a Country: </label>
              <select class = "form-control"  id = "country_list" onChange="getDistrict(this.value);" name="COUNTRY_CODE" required>
		          <option > select country </option>
              <?php
              $sql = "SELECT COUNTRY_NAME,COUNTRY_CODE FROM country";
              $result = $db->query($sql);
              while ($rs=$result-> fetch_assoc())
              {
              ?>
              <option  value = "<?php echo $rs ['COUNTRY_CODE']; ?>"> <?php echo $rs ["COUNTRY_NAME"]; ?> </option>
              <?php
              }
              ?>
              </select>
              </div>
 

 

	<div class="form-group">
  <label> Select a District: </label>
	<select class = "form-control" id = "district_list" name="DISTRICT" required>
	<option value =""> select district </option>
	</select>
  </div>

  <div class="form-group">
  <label for="cityname">City Name:</label>
  <input class = "form-control" pattern='[A-Za-z\\s]*' type="text" id="cityname" name="CITY_NAME" placeholder="enter characters only.." required/>
  </div>
  
  <div class="form-group">
  <label for="population">Population:</label>
  <input class = "form-control" type="number" id="population" name="POPULATION" placeholder="enter numbers only.." required/>
  </div>
  </div>
      
  <input type="submit" value="Enter">

  



   </form>
   </body>
   </html>