<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	
	
	//Setting Variables to add a new city if the user wants to
    $CITY_NAME= ($_POST["CITY_NAME"]);
    $POPULATION= ($_POST["POPULATION"]);
	$COUNTRY_CODE= ($_POST["COUNTRY_CODE"]);
	$DISTRICT= ($_POST["DISTRICT"]);
    
    

    //to insert data in to city table
	$sql1 = "insert into city (CITY_NAME,POPULATION,COUNTRY_CODE,DISTRICT) values ('$CITY_NAME','$POPULATION','$COUNTRY_CODE','$DISTRICT')";

    //to check whether inserting or not
   $db->query($sql1);
	 if($sql1)
	 {
	 	?>
        <script>window.location='cityform.php?success=1';</script>;
		<?php
     }
	
	else
	{ 
       echo "false";
	}


} 

?>