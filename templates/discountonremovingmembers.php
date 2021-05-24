<?php
$num_of_attendees	=	$_POST['personcounter1'];

		if( empty ($num_of_attendees) ) return;
		
		require_once('/home/customer/www/staging1.sprint0.com/db-config/config-sprint.php');


		$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

		$qry1=mysqli_query($con, "SELECT MAX( `No_of_People` ) FROM `h8z_SPR_Config_Multi_Attendee_Discount` WHERE `Enabled_YN` = 'Y' ");
		$res1=mysqli_fetch_row($qry1);

		$max_person_discount = $res1[0];

		if( $num_of_attendees > $max_person_discount ) {
			$discount_people = $max_person_discount;
		} else {
			$discount_people = $num_of_attendees;
		}

		$qry2=mysqli_query($con, "SELECT `Discount_Amount` FROM `h8z_SPR_Config_Multi_Attendee_Discount` WHERE `No_of_People` = '$discount_people' && `Enabled_YN` = 'Y' ");
		$res2=mysqli_fetch_row($qry2);

		$discountamount	=	$res2[0]*$num_of_attendees;	

		echo $discountamount;

		mysqli_close($con);
	//}

?>