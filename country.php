<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	include("connect.php");


	
	//Setting Variables to add a new country if the user wants to
    $COUNTRY_CODE= ($_POST["COUNTRY_CODE"]);
    $COUNTRY_NAME= ($_POST["COUNTRY_NAME"]);
    $CONTINENT= ($_POST["CONTINENT"]);
    $TIME_ZONE= ($_POST["TIME_ZONE"]);
    $SURFACE_AREA= ($_POST["SURFACE_AREA"]);
	$YEAR_INDEPENDENCE= ($_POST["YEAR_INDEPENDENCE"]);
	$POPULATION= ($_POST["POPULATION"]);
	$LIFE_EXPECTENCY= ($_POST["LIFE_EXPECTENCY"]);
	$GNP= ($_POST["GNP"]);
	$GNP_OLD= ($_POST["GNP_OLD"]);
	$LOCAL_NAME= ($_POST["LOCAL_NAME"]);
	$POLITICAL_SYSTEM= ($_POST["POLITICAL_SYSTEM"]);
	$POLITICAL_RULER= ($_POST["POLITICAL_RULER"]);
	$CAPITAL= ($_POST["CAPITAL"]);
	$ISO_3166= ($_POST["ISO_3166"]);


	

  
    
    
    //to insert data in to country table
	$sql = "insert into country (COUNTRY_CODE,COUNTRY_NAME,CONTINENT,TIME_ZONE,SURFACE_AREA,YEAR_INDEPENDENCE,POPULATION,LIFE_EXPECTENCY,GNP,GNP_OLD,LOCAL_NAME,POLITICAL_SYSTEM,POLITICAL_RULER,CAPITAL,ISO_3166) values ('$COUNTRY_CODE','$COUNTRY_NAME', '$CONTINENT','$TIME_ZONE','$SURFACE_AREA','$YEAR_INDEPENDENCE','$POPULATION','$LIFE_EXPECTENCY','$GNP','$GNP_OLD','$LOCAL_NAME','$POLITICAL_SYSTEM','$POLITICAL_RULER','$CAPITAL','$ISO_3166')";

    //to check whether connected or not
   $db->query($sql);
	if($db->query($sql))
	{
		echo "error: ".$db->query($sql);
	}
	else
	{ 
		?>

		<script>window.location='countryform.php?success=1';</script>;
		<?php
	}

}