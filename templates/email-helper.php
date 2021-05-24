<?php 

// error_reporting("E_ALL");
// ini_set('display_errors', 1);
/**
* Email Helper
* 
*/

/* 

$Email_Address
$First_Name
$Last_Name
$course_name1
$pCourse_Location1
$pCourse_Date2
$Order_date
$CoursePayee_ID
$payee_first_name
$payee_last_name
$payment_email
$cardholder_name
$Course_balance_due1
$orderCode
$Payment_Method

*/

//print_r("BUZZZINGA!!"); exit;

function email_attendee_booking_confirmation($First_Name, $Last_Name, $Email_Address, $courseDetails, $paymentDetails){

	extract($courseDetails);
	extract($paymentDetails);

	// To : Attendees sepretly (if multiple attendees) 


	$from		= 'Sprint0 Training <support@sprint0.com>';
	//echo $to 		= 'support@sprint0.com';
	$to 		= $Email_Address;
	// $to 		= 'rohitjain556@outlook.com';
	// $to 		= 'vishawkarma2016@gmail.com';
	$subject 	= 'Important - Course Booking Confirmation - '.$course_name1.'';

	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
	// Create email headers
		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'BCC: bookings@sprint0.com'."\r\n".
		'X-Mailer: PHP/' . phpversion();
		
	// Compose a simple HTML email message
	$message = '<html><body>';
	//$message .= '<h2 style="">Important- Course Booking Confirmation - '.$course_name.' </h2>';
	$message .= '<p>Dear '.$First_Name.',</p>';
	$message .= '<p>Congratulations on booking '.$course_name1.' course. I am so excited to welcome you on the start of an incredible journey into Scaling Agile !</p>';
	$message .= '<p>I look forward to meeting you at '.$course_name1.'. The details are below :</p>';
	$message .= '<h3>Course Details</h3>';
	$message .= '<p">
						<ul>
						<li>'.$course_name.' </li>
						<li>'.$pCourse_Location1.'</li>
						<li>'.$pCourse_Date2.' </li>
						</ul>
					</p>';
	$message .= '<h3>Course Attendee(s)</h3>';
	$message .= '<p>'.$First_Name.' '.$Last_Name.', <a style="color: #811619;" href="mailto:'.$Email_Address.'">'.$Email_Address.'</a></p>';
	$message .= '<h3>Payee Details</h3>';
	$message .= '<p><span style="color: #000000;"> Name : '.$payee_first_name.' '. $payee_last_name.', '.$payment_email.'</span></p>';
	
	$message .= '<p>If you have any questions please dont hesitate to contact the helpdesk on <a style="color: #811619;" href="mailto:support@sprint0.com">support@sprint0.com</a>.</p>';
	$message .= '<p>'.$First_Name.', I am really looking forward to meet you on the day.</p>';
	$message .= '<p>Kind Regards</p>';
	$message .= '<p style="margin-top: 0.83em;">Ahmed Syed</p>';
	$message .= '<p style="">Phone : 07405 998194</p>';
	$message .= '<p style="">Email : <a style="color: #811619;" href="mailto:support@sprint0.com">support@sprint0.com</a></p>';
	$message .= '<p style="">Web : <a style="color: #811619;" href="www.sprint0.com">www.sprint0.com</a></p>';
	$message .= '<div style="clear:both;"></div>
				<div>
					
						<div style="display: inline-flex;"><p style="color: #811619;">Sprint0 Training <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
						</div>
						<p style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited is a limited company registered in England and Wales.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Company Registration No. 07553770.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Registered Offices : First Floor Telecom House, 125-135 Preston Road,</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Please note that Sprint 0 Solutions Limited may monitor, analyse and archive email traffic, data and the content of email for the purposes of security, legal compliance and staff training.</p>
					
				</div>';
	$message .= '</body></html>';

	mail($to, $subject, $message, $headers);
										
}



/**************Mail to Payee With all attendees Details********************/ 
/*


$payment_email
$course_name1
$payee_first_name
$payee_last_name
$pCourse_Location1
$pCourse_Date2
$fnames
$value['fname11']
$Order_date
$CoursePayee_ID
$cardholder_name
$Course_balance_due1
$orderCode
$Payment_Method


*/

function email_payee_attendee_details($courseDetails, $attendeeDetails, $paymentDetails){

	extract($courseDetails);
	//extract($attendeeDetails);
	extract($paymentDetails);


	$from		= 'Sprint0 Training <support@sprint0.com>';
	//echo $to 		= 'support@sprint0.com';
	$to 		= $payment_email;
	// $to 		= 'rohitjain556@outlook.com';
	// $to 		= 'vishawkarma2016@gmail.com';
	$subject 	= 'Important - Course Booking Confirmation - '.$course_name1.'';

	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	// Create email headers
		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'BCC: bookings@sprint0.com'."\r\n".
		'X-Mailer: PHP/' . phpversion();
	// Compose a simple HTML email message
	$message = '<html><body>';
	//$message .= '<h2 style="">Important- Course Booking Confirmation - '.$course_name.' </h2>';
	$message .= '<p>Dear '.$payee_first_name.',</p>';
	$message .= '<p>Congratulations on booking '.$course_name1.' Course. I am so excited to welcome you on the start of an incredible journey into Scaling Agile ! </p>';
	$message .= '<p>I look forward to meeting you at '.$course_name1.'. The details are below : </p>';

	$message .= '<h3>Course Details</h3>';
	$message .= '<p>
						<ul>
						<li>'.$course_name.' </li>
						<li>'.$pCourse_Location1.'</li>
						<li>'.$pCourse_Date2.' </li>
						</ul>
					</p>';
	$message .= '<h3>Course Attendee(s)</h3>';
					if( count($attendeeDetails )) {	

	$message .= '<ol>';			
						
						foreach($attendeeDetails as $attendee){
								
	$message .= '<li>'.$attendee['firstName'].' '.$attendee['lastName'].', ' .$attendee['email'].'</li>';
							}				
	$message .= '</ol>';
		
					}else{			
	$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';					}
	$message .= '<h3>Payment Details</h3>';
	
	$message .= '<p><span style="color: #000000;">Order Date/Time :'.$Order_date.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Order ID : '.$CoursePayee_ID.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Name : '.$payee_first_name.' '. $payee_last_name.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Email Address : '.$payment_email.'</span></p>';

	$payee_name_lbl = ($Payment_Method == 'PayPal') ? 'PayPal Payee Name' : 'Cardholder Name';

	$message .= '<p><span style="color: #000000;"> '. $payee_name_lbl .' : '.$cardholder_name.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Amount : £'.$Course_balance_due1.'</span></p>';
	
	$payee_authcode_lbl = ($Payment_Method == 'PayPal') ? 'PayPal Transaction ID' : 'Payee Authorisation Code';

	$message .= '<p><span style="color: #000000;"> ' . $payee_authcode_lbl . ' : '.$orderCode.'</span></p>';
	
	$message .= '<p><span style="color: #000000;"> Payment Method : '.$Payment_Method.'</span></p><br>';
	$message .= '<p>If you have any questions please dont hesitate to contact the helpdesk on <a style="color: #811619;" href="mailto:support@sprint0.com">support@sprint0.com</a>.</p>';
	$message .= '<p>'.$payee_first_name.', I am really looking forward to meet you on the day.</p>';
	$message .= '<p>Kind Regards</p>';
	$message .= '<p style="margin-top: 0.83em;">Ahmed Syed</p>';
	$message .= '<p style="">Phone : 07405 998194</p>';
	$message .= '<p style="">Email : <a style="color: #811619;" href="mailto:support@sprint0.com">support@sprint0.com</a></p>';
	$message .= '<p style="">Web : <a style="color: #811619;" href="www.sprint0.com">www.sprint0.com</a></p>';
	
	$message .= '<div style="clear:both;"></div>
				<div>
					
						<div style="display: inline-flex;"><p style="color: #811619;">Sprint0 Training <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
						</div>
						<p style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited is a limited company registered in England and Wales.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Company Registration No. 07553770.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Registered Offices : First Floor Telecom House, 125-135 Preston Road,</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Please note that Sprint 0 Solutions Limited may monitor, analyse and archive email traffic, data and the content of email for the purposes of security, legal compliance and staff training.</p>
					
				</div>';
	$message .= '</body></html>';

	mail($to, $subject, $message, $headers);

}



/**************Invoice to Payee********************/ 

/*

$payment_email
$date1
$CoursePayee_ID
$payee_first_name
$payee_last_name
$payment_company
$payment_address1
$payment_address2
$payment_city
$payment_state
$payment_country
$pCourse_qty
$course_name
$Course_Price
$LaunchDiscount_type
$Launch_Discount
$MultipleAttendeeD_type
$Coupoun_MultipleAttendeeDiscount
$Coupoun_Discount_type
$Coupoun_Discount
$EarlyBirdDiscount_type
$EarlyBirdDiscount
$excl_vat
$hiddenVAT
$Course_balance_due


*/

function email_payee_invoice($courseDetails, $paymentDetails){

	extract($courseDetails);
	extract($paymentDetails);

	// $discount_type_array = array();
	// if( !empty($Launch_Discount) ) { $discount_type_array[] = "Launch Discount"; }
	// if( !empty($Coupoun_MultipleAttendeeDiscount) ) { $discount_type_array[] = "Multiple Attendee Discount"; }
	// if( !empty($Coupoun_Discount) ) { $discount_type_array[] = "Coupon Discount"; }
	// if( !empty($EarlyBirdDiscount) ) { $discount_type_array[] = "EarlyBird Discount"; }

	// if( !empty( $discount_type_array ) ) { 
	// 	$discount_type_str = implode(', ', $discount_type_array); 
	// } else { $discount_type_str = "---"; }


	$from		= 'Sprint0 Training <support@sprint0.com>';
	//echo $to 		= 'support@sprint0.com';
	$to 		= $payment_email;
	// $to 		= 'rohitjain556@outlook.com';
	// $to 		= 'vishawkarma2016@gmail.com';
	$subject 	= $course_name .' Course Receipt';

	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	// Create email headers
		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	// Compose a simple HTML email message
	$message = '<html><body>';
	
	$message .= '<div style="padding: 10px;margin-left: 10%;margin-right:10%;color: #811619;"><h2>Sprint0 Training</h2></div>';
	
	$message .= '<div style="border:2px dashed #d2d2d2;padding: 10px;margin: 1% 10% 0% 10%;">';
	/*float left*/
	
	$message .= '<div style="float:left;width:40%;">';					
	$message .= '<ul style="padding-left: 20px;">
					<p id="p_details"><strong>Date:   </strong>'.$date1.'</p>
					<p id="p_details"><strong>Type:	</strong>Receipt</p>
					<p id="p_details"><strong>Order ID:	</strong>'.$CoursePayee_ID.'</p>
					</ul>';
	$message .= '</div>';
	/*float right*/
	
	$message .= '<div style="float:right;width:45%;">';
	$message .= '<ul style="padding-right: 20px;text-align: right;">
					<p id="p_details">'.$payee_first_name.' '.$payee_last_name.'</p>
					<p id="p_details">'.$payment_company.'</p>
					<p id="p_details">'.$payment_address1.' '.$payment_address2.'</p>
					<p id="p_details">'.$payment_city.'</p>
					<p id="p_details">'.$payment_state.', '.$payment_country.'</p>
					</ul>';
	$message .= '</div>';

	$message .= '<div style="clear:both;"><br></div>';
	
	$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;"><h3 style="color:#4CAF50;margin-top: 0.5em;margin-bottom: 0.5em;">Thank you for your payment.</h3></div>';
	
	$message .= '<div style="clear:both;"><br></div>';
	
	$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;background:#d2d2d2;"><h4 style="color:#fff;margin-top: 0.6em;margin-bottom: 0.6em;">CHARGES</h4></div>';
	
	$message .= '<div style="clear:both;"><br></div>';
	
	$message .= '<div id="summary-table">
				<table class="col-md-12">
				<tr>
				</tr>
				<tr>
					<th style="text-align:center;width:20%;vertical-align: top;">Date</th>							
					<th style="text-align:center;width:30%;vertical-align: top;">Description</th>							
					<th style="text-align:center;width:30%;vertical-align: top;"></th>
					<th style="text-align:center;width:20%;vertical-align: top;">Amount</th>
				</tr>';
				
	$message .= '<tr id="main" style="">	
					<td style="text-align:center;vertical-align: top;">'.$date1.'</td>				
					<td style="text-align:center;vertical-align: top;">'.$pCourse_qty.'  '.$course_name . " " . $pCourse_Location1.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>	
					<td style="text-align:center;vertical-align: top;">£'.$Course_total_Price.'</td>
				</tr>
				
				<tr id="LaunchDiscount_type" style="">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<td style="text-align:center;vertical-align: top;">'.$LaunchDiscount_type.'</td>	
					<td style="text-align:center;vertical-align: top;">'.$Launch_Discount.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				
				<tr id="MultipleAttendeeD_type" style="">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<td style="text-align:center;vertical-align: top;">'.$MultipleAttendeeD_type.'</td>	
					<td style="text-align:center;vertical-align: top;">'.$Coupoun_MultipleAttendeeDiscount.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				
				<tr id="Coupoun_Discount_type" style="">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<td style="text-align:center;vertical-align: top;">'.$Coupoun_Discount_type.'</td>	
					<td style="text-align:center;vertical-align: top;">'.$Coupoun_Discount.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				
				<tr id="EarlyBirdDiscount_type">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<td style="text-align:center;vertical-align: top;">'.$EarlyBirdDiscount_type.'</td>	
					<td style="text-align:center;vertical-align: top;">'.$EarlyBirdDiscount.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				<tr></tr>									
				<tr id="excl_vat" style="">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<th style="text-align:right !important;" >Total (excl VAT)</th>
					<td style="text-align:center;vertical-align: top;">£'.$excl_vat.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				
				<tr id="hiddenVAT" style="">	
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<th style="text-align:right !important;" >VAT (20%)</th>
					<td style="text-align:center;vertical-align: top;">+£'.$hiddenVAT.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>
				
				<tr id="trCourse_total_Price" style="">	
					
					<td style="text-align:center;vertical-align: top;"></td>				
					<td style="text-align:center;vertical-align: top;"></td>								
					<th style="text-align:right !important;"> Total (GBP) :</th>								
					<td style="text-align:center;vertical-align: top;">'.$Course_balance_due.'</td>
				</tr>

				</table>
			</div>';

			
	$message .= '<div style="clear:both;"><br></div>';
	
	$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;background:#d2d2d2;"><h4 style="color:#fff;margin-top: 0.6em;margin-bottom: 0.6em;">PAYMENTS</h4></div>';
	
	
	
	$message .= '<div><table class="col-md-12">
				<tr>
				</tr>
				<tr>
					<th style="width:33.3%">Date</th>							
					<th style="width:33.3%">Description</th>							
					<th style="width:33.3%">Amount</th>
				</tr>';
				
	$message .= '<tr id="">	
					<td style="text-align:center;vertical-align: top;">'.$date1.'</td>				
					<td style="text-align:center;vertical-align: top;">'.$Payment_Method.'</td>								
					<td style="text-align:center;vertical-align: top;">'.$Course_balance_due.'</td>								
					<td style="text-align:center;vertical-align: top;"></td>
				</tr>							
				</table>
			</div>
			</div>';
	$message .= '<div style="clear:both;"></div>
				<div>
					<center>
						<h2 style="color: #811619;margin-top: 0.83em;margin-bottom: 0em;">Thank you for your business!</h2>
						<div style="display: inline-flex;"><p style="color: #811619;">Sprint0 Training <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
						</div>
						<h2 style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited,</h2>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">First Floor Telecom House, 125-135 Preston Road,</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
						<p style="margin-top: 0.83em;margin-bottom: 0em;"><a href="https://www.sprint0.com">www.sprint0.com</a>, <a href="mailto:support@sprint0.com">support@sprint0.com</a></p>
						<h3 style="color: #811619;margin-top: 0.83em;margin-bottom: 0em;">Company No: 07553770. VAT No: 120092173.</h3>
					</center>
				</div>';

	$message .= '</div><style>
	ul{
		list-style-type:none;
	}
	#p_details{
			-webkit-margin-before: 0px;
			-webkit-margin-after: 2px;
			-webkit-margin-start: 0px;
			-webkit-margin-end: 0px;
	}
	td{
		text-align:center;vertical-align: top;
	}
	th{
		text-align:center;width:25%;vertical-align: top;
	}
	tr{
		height: 30px;
	}
	</style>';
	$message .= '</body></html>';

	mail($to, $subject, $message, $headers);
}


/**************Mail to bookings@sprint0.com  With all attendees Details********************/ 

/*

$course_name1
$pCourse_Location1
$pCourse_Date2
$payee_first_name
$payee_last_name
$payment_email
$fnames


*/



function email_admin_bookinginfo($courseDetails, $attendeeDetails, $paymentDetails){

	extract($courseDetails);
	//extract($attendeeDetails);
	extract($paymentDetails);
	
	$from		= 'Sprint0 Training <training@sprint0.com>';
	//echo $to 		= 'support@sprint0.com';
	$to 		= 'bookings@sprint0.com';
	$subject 	= 'Important - Course Booking Confirmation - '.$course_name1.'';

	// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	// Create email headers
		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	// Compose a simple HTML email message
	$message = '<html><body>';
	//$message .= '<h2 style="">Important- Course Booking Confirmation - '.$course_name.' </h2>';


	$message .= '<h3>Course Details</h3>';
	$message .= '<p>
						<ul>
						<li>'.$course_name1.' </li>
						<li>'.$pCourse_Location1.'</li>
						<li>'.$pCourse_Date2.' </li>
						</ul>
					</p>';
	$message .= '<h3>Payee Details</h3>';
	$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';

	$message .= '<h3 >Course Attendee(s)</h3>';
					if( count($attendeeDetails )) {	

	$message .= '<ol>';			
						
				foreach($attendeeDetails as $attendee){
								
	$message .= '<li>'.$attendee['firstName'].' '.$attendee['lastName'].', ' .$attendee['email'].'</li>';
				}

	$message .= '</ol>';
						
						
					}else{			
	$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';					
					}
	$message .= '<h3>Payment Details</h3>';
	
	$message .= '<p><span style="color: #000000;">Order Date/Time :'.$Order_date.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Order ID : '.$CoursePayee_ID.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Name : '.$payee_first_name.' '. $payee_last_name.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Email Address : '.$payment_email.'</span></p>';

	$payee_name_lbl = ($Payment_Method == 'PayPal') ? 'PayPal Payee Name' : 'Cardholder Name';

	$message .= '<p><span style="color: #000000;"> '. $payee_name_lbl .' : '.$cardholder_name.'</span></p>';
	$message .= '<p><span style="color: #000000;"> Amount : £'.$Course_balance_due1.'</span></p>';
	
	$payee_authcode_lbl = ($Payment_Method == 'PayPal') ? 'PayPal Transaction ID' : 'Payee Authorisation Code';

	$message .= '<p><span style="color: #000000;"> ' . $payee_authcode_lbl . ' : '.$orderCode.'</span></p>';
	
	$message .= '<p><span style="color: #000000;"> Payment Method : '.$Payment_Method.'</span></p><br>';
	$message .= '<div style="clear:both;"></div>';
	$message .= '</body></html>';

	mail($to, $subject, $message, $headers);
}