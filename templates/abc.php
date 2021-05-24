

<?php 
$file = file_get_contents('mydata.txt', true);

$value = json_decode($file,true);

	
$payee_first_name						=	$value['pp_payment_first_name'];
$payee_last_name						=	$value['pp_payment_last_name'];
$payment_email							=	$value['pp_payment_email'];
$payment_company						=	$value['pp_payment_company'];
$payment_phone							=	$value['pp_payment_phone'];
$payment_address1						=	$value['pp_payment_address1'];
$payment_address2						=	$value['pp_payment_address2'];
$payment_city							=	$value['pp_payment_city'];
$payment_state							=	$value['pp_payment_state'];
$bpostal_code							=	$value['pp_bpostal_code'];
$payment_country						=	$value['pp_payment_country'];
$pCourse_Date							=	$value['pCourse_Date'];
$pCourse_Location						=	$value['pCourse_Location'];
$pCourse_qty							=	$value['pCourse_qty'];
$Launch_Discount						=	$value['Launch_Discount'];
$EarlyBirdDiscount						=	$value['EarlyBirdDiscount'];
$Coupoun_MultipleAttendeeDiscount		=	$value['Coupoun_MultipleAttendeeDiscount'];
$Coupoun_Discount						=	$value['Coupoun_Discount'];
$fnames 								= 	$value['fname11'];		
$due_balance							=	$value['amount'];
$course_name							=	$value['item_name'];
$courseid								=	$value['Course_ID'];
$date1									=	date('Y-m-d');

$fnames = $value['fname11'];
				
				$counter = count($fnames);
				
				for($u=0;$u<$counter;$u++){					
					$First_Name		=	$value['fname11'][$u];
					$Last_Name		=	$value['lname11'][$u];
					$Email_Address	=	$value['email11'][$u];	


// To : Payee (if multiple attendees) 


$from		= 'training@sprint0.com';
//echo $to 		= 'support@sprint0.com';
'</br>';
$to 		= 'vishawkarma2016@gmail.com';
'</br>';
$subject 	= 'Course Booking';
echo '</br>';

// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
// Create email headers
	$headers .= 'From: '.$from."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#4556a0;"><strong>Important- </srong>Course Booking Confirmation - '.$course_name.' </h1>';
$message .= '<h1 style="color:#4556a0;">Dear '.$payee_first_name.',</h1>';
$message .= '<p style="font-size:18px;">Congratulations on booking the first '.$course_name.'. I am so excited to welcome you on the start of an incredible journey !</p>';
$message .= '<p style="font-size:18px;">In this course you will learn :</p>';
$message .= '<p style="font-size:18px;">
				<ul>
				<li>All about the Mindset that powers the most productive teams in the world. </li>
				<li>The Philosophies that underpin this mindset.</li>
				<li>The 3 Principles which are the foundation upon which everything is built. </li>
				<li>The Practices which allow you to embed the Philosophies and Principles into your daily life. </li>
				</ul>
			</p>';
$message .= '<p style="font-size:18px;">We take the latest breakthroughs in neuroscience, cognitive behavioural therapy, motivation and sports psychology and incorporate the best of this into the Agile world, creating a unique and fresh perspective and a new ability to power your and your team’s performance and impact.</p>';

$message .= '<h2 style="color:#4556a0;"><strong>Course Details</strong></h2>';
$message .= '<p style="font-size:18px;">
					<ul>
					<li>'.$course_name.' </li>
					<li>'.$pCourse_Location.'</li>
					<li>'.$pCourse_Date.' </li>
					</ul>
				</p>';
$message .= '<h2 style="color:#4556a0;"><strong>Course Attendee(s)</strong></h2>';
$message .= '<p style="font-size:18px;">'.$First_Name.'&nbsp;'.$Last_Name.', ' .$Email_Address.'</p>';
$message .= '<h2 style="color:#4556a0;"><strong>Payment Details</strong></h2>';
$message .= '<p style="font-size:18px;">'.$payee_first_name.'&nbsp;'.$payee_last_name.', ' .$payment_email.'</p>';
$message .= '<p style="font-size:18px;">If you have any questions please dont hesitate to contact the helpdesk on training@sprint0.com.</p>';
$message .= '<p style="font-size:18px;">'.$First_Name.',I am really looking forward to meet you on the day.</p>';
$message .= '<h3>Kind Regards</h3>';
$message .= '<h3 style="">Ahmed Syed</h3>';
echo $message .= '</body></html>';

mail($to, $subject, $message, $headers);
}
/*
echo 'To : Payee (if multiple attendees) or  to Single ‘Attendee/Payee’ >';
echo 'Important - Course Booking Confirmation - Certified Agile Mindset Practices Professional'
echo 'Dear <First Name>'
echo 'Congratulations on booking the Worlds first Certified Agile Mindset Practices Professional Course. I am so excited to welcome you on the start of an incredible journey !
 
In this course you will learn : 
•	All about the Mindset that powers the most productive teams in the world. 
•	The Philosophies that underpin this mindset.
•	The 3 Principles which are the foundation upon which everything is built. 
•	The Practices which allow you to embed the Philosophies and Principles into your daily life.  

We take the latest breakthroughs in neuroscience, cognitive behavioural therapy, motivation and sports psychology and incorporate the best of this into the Agile world, creating a unique and fresh perspective and a new ability to power your and your team’s performance and impact.

Course Details
•	Course Title
•	Course Location
•	Course Date/Time

Course Attendee(s)
•	<First Name><Last Name>, <Email Address>
•	<First Name><Last Name>, <Email Address>
•	<First Name><Last Name>, <Email Address>
•	<First Name><Last Name>, <Email Address>

Payment Details
•	<Payee First Name><Payee Last Name>, <Payee Email Address>
•	<Payment Summary Information>- Get this from the page 1 summary. 

If you have any questions please dont hesitate to contact the helpdesk on training@sprint0.com.<FirstName>,I am really looking forward to meet you on the day.

Kind Regards',

'Ahmed Syed.';

*/
?>