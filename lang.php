
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	include("connect.php");


	
	//Setting Variables to add a new country if the user wants to
    $COUNTRY_CODE= ($_POST["COUNTRY_CODE"]);
    $LANG= ($_POST["LANG"]);
    $OFFICIAL_LANG= ($_POST["OFFICIAL_LANG"]);
    $PERCENTAGE= ($_POST["PERCENTAGE"]);
    


  	$sql_l = "SELECT * FROM lang WHERE LANG='$LANG' AND COUNTRY_CODE = '$COUNTRY_CODE'";
  	$res_l = mysqli_query($db, $sql_l);

   if(mysqli_num_rows($res_l) > 0)
    
    {
			 $lang_error = "language already exists";
			 echo $lang_error; 	
    }
  	else
  	{
    
    //to insert data in to country table
	$sql = "insert into lang (COUNTRY_CODE, LANG, OFFICIAL_LANG, PERCENTAGE) values ('$COUNTRY_CODE','$LANG','$OFFICIAL_LANG','$PERCENTAGE')";
	$db->query($sql);
	if($db->query($sql))
	{
		echo "error: ".$db->query($sql);
	}
	else
	{ 
		?>
		<script>window.location='languageform.php?success=1';</script>;
		<?php
	}
    }

    //to check whether connected or not
   

}