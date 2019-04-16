<!DOCTYPE html>
<html>
<head>
	<title>language</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script>
  function getLangData(val)
{
     $.ajax({
           method :"POST",
           url : "getLangDataForInsert.php",
           data: 'COUNTRY_SELECTED='+val,
           success : function(data)
           {
           	$("#edit_lang").html(data);
           }
           });
}
  </script>

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
.form-group
{
  font-family: "Trebuchet MS", Helvetica, sans-serif;
}


</style>
</head>
<?php
include ("connect.php");
?>
<body>

<form id ="edit_lang" action="lang.php" method="post">

	             <div class = "container-fluid">
               <div class="form-group">

              <label> Select a Country: </label>
              <select class = "form-control"  id = "country_list"  name="COUNTRY_CODE" onChange='getLangData(this.value);' required>
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
  <div <?php if (isset($lang_error)): ?> class="form_error" <?php endif ?> >
  <label for="LANGUAGE">LANGUAGE:</label>
  
  <select class = "form-control" name = 'LANG' required>
  <option>Choose a language</option>
  <?php
  $sqlgetlang = "SELECT * FROM lang_exists";
    $query = $db->query($sqlgetlang);// or die("Failure, no country selected");
            if ($db->query($sqlgetlang)){
    	        while ($row = $query->fetch_assoc()){
                    echo "<option value='" . $row['LANG']."'>".$row['LANG']."</option>";
                }
            }else{
                echo "<option value = ''>No Lang</option>";
            }
  ?>
  </select>
  </div>
  </div>

  <div class="form-group">
  <label for="officialLANGUAGE">Is this the Official Language?</label>
  <input class = "form-control" type="text" id="officialLANGUAGE" name="OFFICIAL_LANG" placeholder="enter T if YES enter F if NO.." required maxlength="1" />
  </div>
   
  
  <div class="form-group">
  <label for="percentage">Percentage:</label>
  <input class = "form-control" type="number" step="0.01" id="percentage" name="PERCENTAGE" placeholder="enter numbers only.." required/>
  </div>
  </div>
      
  <input type="submit" value="Enter">

   </form>
   </body>
   </html>