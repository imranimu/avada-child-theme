<?php

require_once('/home/customer/www/sprint0.com/db-config/config-sprint.php');

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);



	$aa 	=	$_POST['Discountamount'];
	$aa1 	=	$_POST['Total33'];	

	$find  = array('£', ',');
	$replace = array('', '');

	$aa1 	=	str_replace($find, $replace, $aa1);
	
	// @mysql_connect("localhost","sprint00_agdb",",dx{5^VB0k1f)");
	// @mysql_select_db("sprint00_agdb");
	
	$qry	=	mysqli_query($con, "SELECT Discount_Amount FROM h8z_SPR_Config_Discount_Code WHERE BINARY Discount_Code = '$aa' && Enabled_YN = 'Y' && Discount_Valid_Date >= CURDATE() ");
	
	$row				=	mysqli_fetch_row($qry);
	// $discountpercent	=	$row[0];
	$discountamount	=	$row[0];

	
	
	if($discountamount != ''){
		// $ActualTotal		=	$aa1;
		// $NewAmount			=	(($ActualTotal * $discountpercent) / 100);
		// echo $NewAmount;
		echo $discountamount;
	}
	else{
		echo "error";
	}

	mysqli_close($con);
			
?>