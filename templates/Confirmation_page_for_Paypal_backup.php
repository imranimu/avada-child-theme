<?php
/*
Template name:Confirmation_page_for_Paypal_old
*/
get_header();

//var_dump($_GET); exit;

	$Payment_Status		= 	$_GET['Payment_Status'];
	if($Payment_Status == "SUCCESS"){	
		$file = file_get_contents('./wp-content/themes/Avada/templates/mydata.txt', true);
				
		if($file != ''){

					$value = json_decode($file,true);
					// echo "<pre>";
					// print_r($value);
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
					$pCourse_Date1							=	$value['pCourse_Date'];
					
					if($pCourse_Date1 != ''){
						$pCourse_Date							=	' '.$pCourse_Date1.', ';
					}
					
					$Course_Price1							=	$value['Course_Price'];
					
					if($Course_Price1 != ''){
						$Course_Price							=	$Course_Price1.'.00';
					}			
					$pCourse_Location1						=	$value['pCourse_Location'];
					
					if($pCourse_Location1 != ''){
						$pCourse_Location						=	$pCourse_Location1.'.';
					}
					
					$pCourse_qty							=	$value['pCourse_qty'];
					$Launch_Discount						=	$value['Launch_Discount'];
					
					if($Launch_Discount != ''){
						$LaunchDiscount_type = 'Launch Discount';
						$Launch_Discount = '-£'.$Launch_Discount.'.00';
					}else{
					?>	<style>
						#LaunchDiscount_type{
							display:none;
						}
						</style>
					<?
					}
					$EarlyBirdDiscount						=	$value['EarlyBirdDiscount'];

					if($EarlyBirdDiscount != ''){
						$EarlyBirdDiscount_type = 'EarlyBird Discount';
						$EarlyBirdDiscount = '-£'.$EarlyBirdDiscount.'.00';
					}
					else{
						?>
						<style>
						#EarlyBirdDiscount_type{
							display:none;
						}
						</style>
						<?
					}

					$Coupoun_MultipleAttendeeDiscount1		=	$value['Coupoun_MultipleAttendeeDiscount'];

					if($Coupoun_MultipleAttendeeDiscount != ''){
						$MultipleAttendeeD_type = 'Multiple Attendee Discount';
						$Coupoun_MultipleAttendeeDiscount = '-£'.$Coupoun_MultipleAttendeeDiscount1.'.00';

					}else{
					?>	<style>
						#MultipleAttendeeD_type{
							display:none;
						}
						</style>
					<?
					}
					$Coupoun_Discount						=	$value['Coupoun_Discount'];

					if($Coupoun_Discount != ''){
						$Coupoun_Discount_type = 'Coupoun Discount';
						$Coupoun_Discount = '-£'.$Coupoun_Discount.'.00';

					}else{
					?>	<style>
						#Coupoun_Discount_type{
							display:none;
						}
						</style>
					<?
					}
					$fnames 								= 	$value['fname11'];
					$Course_balance_due						=	$value['pp_payment_amount'];			
					$due_balance							=	$value['amount'];
					
					if($due_balance != ''){
						$due_balance1						=	'£'.$due_balance;
					}
					
					$course_name1							=	$value['item_name'];
					
					if($course_name1 != ''){
						$course_name						=	$course_name1.',';
						$Payment_Method						=	 'PayPal';
						$Order_date							=	date("d F Y H:i:s");
						$date1								=	date('Y-m-d');
						$Invoicedate						=	date('F d, Y');
					}
					
					$courseid								=	$value['Course_ID'];
					$Payment_Status							= 	'SUCCESS';//$_GET['Payment_Status'];
					$Course_name							= 	$_GET['item_name'];
					$Total_attendee							= 	$_GET['Total_attendee'];
					$Total_amount							= 	$_GET['amount'];
					$payment_authCode						=	'Paypal';
					$trans_id 								= 	$_GET['tx'];
					$excl_vat								=	$value['excl_vat'];
					$VAT_Amount								=	$value['hiddenVAT'];
					$pond_sign_d= '-£';

					if($VAT_Amount<1){
							$VAT_Amount = 0;
						}
					
					file_put_contents('./wp-content/themes/Avada/templates/mydata.txt','');
					
					if($payment_email != ''){
					
					@mysql_connect("localhost","sprint00_agdb",",dx{5^VB0k1f)");
					@mysql_select_db("sprint00_agdb");
					
							$qry=	"INSERT INTO h8z_AMP_Data_Course_Payee
												(
													Date,
													First_Name,
													Last_Name,
													Email,
													Company_Name,
													Phone_Number,
													Billing_Address_Street,
													Billing_Address_Extended,
													Billing_Address_Post_Code,
													Billing_Address_City,
													Billing_Address_Country,
													Payment_Amount,
													VAT_Amount,
													Payment_Status,
													Payment_Auth_Code,
													Payment_Method
												)
											VALUES
												(
													'$date1',
													'$payee_first_name',
													'$payee_last_name',
													'$payment_email',
													'$payment_company',
													'$payment_phone',
													'$payment_address1',
													'$payment_address2',
													'$bpostal_code',
													'$payment_city',
													'$payment_country',
													'$due_balance',
													'$VAT_Amount',
													'$Payment_Status',
													'',
													'$Payment_Method'
												)
									";
							// echo "<pre>";
							// print_r($qry);
										
							$qry1=mysql_query($qry);
					
					}
					/****************submit data in attendee table**************/
					
						$counter = count($fnames);
						
						// print_r($counter);
						
						if($payment_email != ''){
							
						$Course_Payee_ID	=	mysql_query("SELECT Course_Payee_ID FROM h8z_AMP_Data_Course_Payee WHERE Email = '$payment_email' ORDER BY Course_Payee_ID DESC LIMIT 1 ");
						$Course_Payee_ID1	=	mysql_fetch_row($Course_Payee_ID);	
						
						$Course_Payee_ID2	=	$Course_Payee_ID1[0];
						
						}

						if($fnames){
							if($fnames != ''){
								for($u=0;$u<$counter;$u++){
										$First_Name		=	$value['fname11'][$u];
										$Last_Name		=	$value['lname11'][$u];
										$Email_Address	=	$value['email11'][$u];	
										if($Email_Address != ''){
											$qry55 =	"INSERT INTO h8z_AMP_Data_Course_Attendee
																				(
																				First_Name,
																				Last_Name,
																				Email_Address,
																				Phone_Number,
																				Company_Name,
																				Course_ID,
																				Course_Payee_ID
																			)
																		VALUES
																			(
																				'$First_Name',
																				'$Last_Name',
																				'$Email_Address',
																				'$payment_phone',
																				'$payment_company',
																				'$courseid',
																				'$Course_Payee_ID2'
																			)	
												";						
											// echo "<pre>";		
											// print_r($qry55);	
											$qry1=mysql_query($qry55);
										}
								}
							}
					
						}else{
								$First_Name		=	$payee_first_name;
								$Last_Name		=	$payee_last_name;
								$Email_Address	=	$payment_email;
								if($Email_Address != ''){									
									$qry55 =	"INSERT INTO h8z_AMP_Data_Course_Attendee
																		(
																		First_Name,
																		Last_Name,
																		Email_Address,
																		Phone_Number,
																		Company_Name,
																		Course_ID,
																		Course_Payee_ID
																	)
																VALUES
																	(
																		'$First_Name',
																		'$Last_Name',
																		'$Email_Address',
																		'$payment_phone',
																		'$payment_company',
																		'$courseid',
																		'$Course_Payee_ID2'
																	)	
										";						
									// echo "<pre>";		
									// print_r($qry55);	
									$qry1=mysql_query($qry55);
								}
								
						}
			
			

	?>

	<div class="fusion-row" style="">
		<div id="content" style="width:100%">
			<div id="post-12877" class="post-12877 page type-page status-publish hentry">
				<span class="entry-title" style="display: none;">Certified-Agile-Mindset-Professional-Course-Booking-Confirmation</span><span class="vcard" style="display: none;"><span class="fn"><a href="https://sprint0.com/author/sprintadmin0786/" title="Posts by Ahmed Syed" rel="author">Ahmed Syed</a></span></span>
				<span class="updated" style="display:none;">2017-05-02T07:59:55+00:00</span><div class="post-content">
				<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
					<div class="fusion-column-wrapper">
						<div class="fusion-title title fusion-title-size-one">
							<h1 class="title-heading-left" data-fontsize="34" data-lineheight="48">Congratulations on booking your <?php echo $course_name1;?> </h1><div class="title-sep-container">
							<div class="title-sep sep-double"></div>
							</div>
						</div>
						<p>Thank you for booking the <?php echo $course_name1;?> course. Please find your booking details below. An email confirmation of your booking has been sent to you. Please check and keep this safe. Additionally, information on the exact location, together with directions will be sent to you in advance of the course.<div class="fusion-clearfix"></div>
					</div>
				</div>
				<div class="fusion-clearfix"></div>
				<div class="fusion-one-half fusion-layout-column fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
					<div class="fusion-column-wrapper" style="border:2px solid #34a332;">
					<div class="fusion-title title fusion-title-size-one">
					<h1 class="title-heading-left" data-fontsize="34" data-lineheight="48"><span style="color: green;"> Your Booking Information </span></h1>
					<div class="title-sep-container"><div class="title-sep sep-none" style="border-color:#ffffff;"></div></div>
					</div>
					<p><span style="color: #008000;">&nbsp;Course Details :&nbsp;</span></p>
					<p style="padding-left: 30px;" id="c_details"><span style="color: #000000;"><?php echo $course_name;?><?php echo $pCourse_Date;?> <?php echo $pCourse_Location;?></span></p>
					
					
					<p><span style="color: #008000;"><strong>&nbsp;</strong>Attendee Information :&nbsp;</span></p>
					
					
					
					<?php 
					if($payment_email != ''){

					$Course_Payee_ID	=	mysql_query("SELECT Course_Payee_ID FROM h8z_AMP_Data_Course_Payee WHERE Email = '$payment_email' ");
					$Course_Payee_ID1	=	mysql_fetch_row($Course_Payee_ID);
			
					$Course_Payee_ID2	=	$Course_Payee_ID1[0];
					
					}
					
					$fnames = $value['fname11'];
					if($fnames){
						
						if($fnames !=""){
							
								$counter = count($fnames);
								$attendee =1;


							for($u=0;$u<$counter;$u++){					

									$First_Name			=	$value['fname11'][$u];
									$Last_Name			=	$value['lname11'][$u];
									$Email_Address		=	$value['email11'][$u];	
										$qry55 ="INSERT INTO h8z_AMP_Data_Course_Attendee	(	
													First_Name,
													Last_Name,
													Email_Address,
													Phone_Number,
													Company_Name,
													Course_ID,
													Course_Payee_ID
													)VALUES(
														'$First_Name',
														'$Last_Name',
														'$Email_Address',
														'$payment_phone',
														'$payment_company',
														'$courseid',
														'$Course_Payee_ID2'
										)";						
									// echo "<pre>";		
									// print_r($qry55);
									
									$qry1=mysql_query($qry55);


							/******************Email To Multiple Attendees seprately**************/
						
						
								// To : Attendees sepretly (if multiple attendees) 


								$from		= 'training@sprint0.com';
								$to 		= $Email_Address;
								// $to 		= 'rohitjain556@outlook.com';
								$subject 	= 'Course Booking Confirmation - '.$course_name1.'';
								// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
								// Create email headers
									$headers .= 'From: '.$from."\r\n".
									'Reply-To: '.$from."\r\n" .
									'X-Mailer: PHP/' . phpversion();
									
								// Compose a simple HTML email message
								$message = '<html><body>';
								//$message .= '<h2 style="color:#4556a0;">Important- Course Booking Confirmation - '.$course_name1.' </h2>';
								$message .= '<p>Dear '.$First_Name.' '.$Last_Name.', </p>';
								$message .= '<p>Congratulations on booking the first '.$course_name1.'. I am so excited to welcome you on the start of an incredible journey !</p>';
								$message .= '<p>In this course you will learn :</p>';
								$message .= "<p>
												<ul>
												<li>All about the Mindset that powers the most productive team's in the world. </li>
												<li>The Philosophies that underpin this mindset.</li>
												<li>The 3 Principles which are the foundation upon which everything is built. </li>
												<li>The Practices which allow you to embed the Philosophies and Principles into your daily life. </li>
												</ul>
											</p>";
								$message .= "<p>We take the latest breakthroughs in neuroscience, cognitive behavioural therapy, motivation and sports psychology and incorporate the best of this into the Agile world, creating a unique and fresh perspective and a new ability to power your and your team's performance and impact.</p>";

								$message .= '<h3>Course Details</h3>';
								$message .= '<p style="font-size:18px;">
													<ul id="c_details">
													<li>'.$course_name1.' </li>
													<li>'.$pCourse_Location.'</li>
													<li>'.$pCourse_Date.' </li>
													</ul>
												</p>';
								$message .= '<h3>Course Attendee(s)</h3>';
								$message .= '<p style="font-size:18px;">'.$First_Name.' '.$Last_Name.', ' .$Email_Address.'</p>';
								$message .= '<h3>Payment Details</h3>';
								$message .= '<p><span style="color: #000000;">Order Date/Time :'.$Order_date.'</p>';
								$message .= '<p><span style="color: #000000;">Order ID :'.$Course_Payee_ID2.'</p>';
								$message .= '<p><span style="color: #000000;">Name :'.$payee_first_name.' '.$payee_last_name.'</p>';
								$message .= '<p><span style="color: #000000;">Email Address :'.$payment_email.'</p>';
								$message .= '<p><span style="color: #000000;">Amount : £'.$due_balance.'</p>';
								$message .= '<p><span style="color: #000000;"> Payment Method : '.$Payment_Method.'</span></p><br>';
								$message .= '<p>If you have any questions please dont hesitate to contact the helpdesk on training@sprint0.com.</p>';
								$message .= '<p>'.$First_Name.', I am really looking forward to meet you on the day.</p>';
								$message .= '<p>Kind Regards</p>';
								$message .= '<p style="margin-top: 0.83em;">Ahmed Syed</p>';
								$message .= '<p style="">Phone : 07405 998194</p>';
								$message .= '<p style="">Email : training@sprint0.com</p>';
								$message .= '<p style="">Web : www.sprint0.com</p>';
								$message .= '<div style="clear:both;"></div>
											<div>
												
													<div style="display: inline-flex;"><p style="color: #4556a0;">Agile Mindset Practices <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
													</div>
													<p style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited is a limited company registered in England and Wales.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Company Registration No. 07553770.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Registered Offices : First Floor Telecom House, 125-135 Preston Road,</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Please note that Sprint 0 Solutions Limited may monitor, analyse and archive email traffic, data and the content of email for the purposes of security, legal compliance and staff training.</p>
												
											</div>';
								$message .= '</body></html>';

								mail($to, $subject, $message, $headers);
								/****************End Email To Multiple Attendees seprately**************/

								?>
							
						<ul style="padding-left: 30px;color: #000;">
							<p><span style="color: #000000;"><li>Name : <?php echo $First_Name.' '. $Last_Name;?></li></span>
							<span style="color: #000000;"> <li>Email Address : <?php echo $Email_Address;?></li></span></p>
						</ul>						

								<?php
							}
							
						}
					}else{
					?>	
						
						<ul style="padding-left: 30px;color: #000;">
							<p><span style="color: #000000;"><li>Name : <?php echo $payee_first_name.' '.$payee_last_name;?></li></span>
							<span style="color: #000000;"> <li>Email Address : <?php echo $payment_email;?></li></span></p>
						</ul>
					<?	
					}
								/**************Mail to Payee With all attendees Details********************/ 

								$from		= 'training@sprint0.com';
								$to 		= $payment_email;
								// $to 		= 'rohitjain556@outlook.com';
								$subject 	= 'Course Booking Confirmation - '.$course_name1.'';

								// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
								// Create email headers
									$headers .= 'From: '.$from."\r\n".
									'Reply-To: '.$from."\r\n" .
									'X-Mailer: PHP/' . phpversion();
								// Compose a simple HTML email message
								$message = '<html><body>';
								//$message .= '<h2 style="color:#4556a0;">Important- Course Booking Confirmation - '.$course_name.' </h2>';
								$message .= '<p>Dear '.$payee_first_name.' '.$payee_last_name.',</p>';
								$message .= '<p>Congratulations on booking the first '.$course_name1.'. I am so excited to welcome you on the start of an incredible journey !</p>';
								$message .= '<p>In this course you will learn :</p>';
								$message .= '<p>
												<ul>
												<li>All about the Mindset that powers the most productive teams in the world. </li>
												<li>The Philosophies that underpin this mindset.</li>
												<li>The 3 Principles which are the foundation upon which everything is built. </li>
												<li>The Practices which allow you to embed the Philosophies and Principles into your daily life. </li>
												</ul>
											</p>';
								$message .= '<p>We take the latest breakthroughs in neuroscience, cognitive behavioural therapy, motivation and sports psychology and incorporate the best of this into the Agile world, creating a unique and fresh perspective and a new ability to power your and your team’s performance and impact.</p>';

								$message .= '<h3>Course Details</h3>';
								$message .= '<p>
													<ul id="c_details">
													<li>'.$course_name1.' </li>
													<li>'.$pCourse_Location.'</li>
													<li>'.$pCourse_Date.' </li>
													</ul>
												</p>';
								$message .= '<h3>Course Attendee(s)</h3>';
												if(isset($fnames)){				
													if($fnames !=""){					
															$counter = count($fnames);
															$attendee =1;
														for($u=0;$u<$counter;$u++){
															$First_Name			=	$value['fname11'][$u];
															$Last_Name			=	$value['lname11'][$u];
															$Email_Address		=	$value['email11'][$u];
								$message .= '<p>'.$First_Name.' '.$Last_Name.', ' .$Email_Address.'</p>';
														}				
													}
												}else{			
								$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';
								}
								$message .= '<h3>Payment Details</h3>';
								$message .= '<p><span style="color: #000000;">Order Date/Time :'.$Order_date.'</p>';
								$message .= '<p><span style="color: #000000;">Order ID :'.$Course_Payee_ID2.'</p>';
								$message .= '<p><span style="color: #000000;">Name :'.$payee_first_name.' '.$payee_last_name.'</p>';
								$message .= '<p><span style="color: #000000;">Email Address :'.$payment_email.'</p>';
								$message .= '<p><span style="color: #000000;">Amount : £'.$due_balance.'</p>';
								$message .= '<p><span style="color: #000000;"> Payment Method : '.$Payment_Method.'</span></p><br>';
								$message .= '<p>If you have any questions please dont hesitate to contact the helpdesk on training@sprint0.com.</p>';
								$message .= '<p>'.$payee_first_name.', I am really looking forward to meet you on the day.</p>';
								$message .= '<p>Kind Regards</p>';
								$message .= '<p style="margin-top: 0.83em;">Ahmed Syed</p>';
								$message .= '<p style="">Phone : 07405 998194</p>';
								$message .= '<p style="">Email : training@sprint0.com</p>';
								$message .= '<p style="">Web : www.sprint0.com</p>';
								$message .= '<div style="clear:both;"></div>
											<div>
												
													<div style="display: inline-flex;"><p style="color: #4556a0;">Agile Mindset Practices <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
													</div>
													<p style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited is a limited company registered in England and Wales.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Company Registration No. 07553770.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Registered Offices : First Floor Telecom House, 125-135 Preston Road,</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Please note that Sprint 0 Solutions Limited may monitor, analyse and archive email traffic, data and the content of email for the purposes of security, legal compliance and staff training.</p>
												
											</div>';
								$message .= '</body></html>';

								mail($to, $subject, $message, $headers);
								/**************End Mail to Payee With all attendees Details********************/ 
								
								/**************Invoice to Payee********************/ 

								$from		= 'training@sprint0.com';
								//echo $to 		= 'support@sprint0.com';
								$to 		= $payment_email;
								$subject 	= 'Certified Agile Mindset Course Receipt';

								// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
								// Create email headers
									$headers .= 'From: '.$from."\r\n".
									'Reply-To: '.$from."\r\n" .
									'X-Mailer: PHP/' . phpversion();
								// Compose a simple HTML email message
								$message = '<html><body>';
								
								$message .= '<div style="padding: 10px;margin-left: 10%;margin-right:10%;color: #4556a0;"><h2>Agile Mindset Practices</h2></div>';
								
								$message .= '<div style="border:2px dashed #d2d2d2;padding: 10px;margin: 1% 10% 0% 10%;">';
								/*float left*/
								
								$message .= '<div style="float:left;width:40%;">';					
								$message .= '<ul style="padding-left: 20px;">
												<p id="p_details"><strong>Date:   </strong>'.$date1.'</p>
												<p id="p_details"><strong>Type:	</strong>Receipt</p>
												<p id="p_details"><strong>Order ID:	</strong>'.$Course_Payee_ID2.'</p>
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
								
								$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;"><h3 style="color:#4CAF50;margin-top: 0.5em;margin-bottom: 0.5em;">Thank You For Your Payment.</h3></div>';
								
								$message .= '<div style="clear:both;"><br></div>';
								
								$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;background:#d2d2d2;"><h4 style="color:#fff;margin-top: 0.6em;margin-bottom: 0.6em;">CHARGES</h4></div>';
								
								$message .= '					
								<div id="summary-table">
											<p name="discountpercent" id="discountpercent" style="Display:NONE"> </p>
											<table class="col-md-12">
											<tr>
											</tr>
											<tr>
												<th style="text-align:center;width:20%;vertical-align: top;">Date</th>							
												<th style="text-align:center;width:30%;vertical-align: top;">Description</th>							
												<th style="text-align:center;width:30%;vertical-align: top;">Discount Type</th>
												<th style="text-align:center;width:20%;vertical-align: top;">Amount</th>
											</tr>';
											
								$message .= '<tr id="LaunchDiscount_type" style="">	
												<td style="text-align:center;vertical-align: top;">'.$Invoicedate.'</td>				
												<td style="text-align:center;vertical-align: top;">x'.$pCourse_qty.'  '.$course_name1.'</td>								
												<td style="text-align:center;vertical-align: top;">--</td>	
												<td style="text-align:center;vertical-align: top;">'.$Course_Price.'</td>								
												<td style="text-align:center;vertical-align: top;"></td>
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
											<tr id="Coupoun_Discount_type" style="">	
												<td style="text-align:center;vertical-align: top;"></td>				
												<td style="text-align:center;vertical-align: top;"></td>								
												<th style="text-align:right !important;" >Total (excl VAT)</th>
												<td style="text-align:center;vertical-align: top;">£'.$excl_vat.'.00</td>								
												<td style="text-align:center;vertical-align: top;"></td>
											</tr>
											
											<tr id="Coupoun_Discount_type" style="">	
												<td style="text-align:center;vertical-align: top;"></td>				
												<td style="text-align:center;vertical-align: top;"></td>								
												<th style="text-align:right !important;" >VAT (20%)</th>
												<td style="text-align:center;vertical-align: top;">£'.$VAT_Amount.'.00</td>								
												<td style="text-align:center;vertical-align: top;"></td>
											</tr>
											
											<tr id="trCourse_total_Price" style="">	
												
												<td style="text-align:center;vertical-align: top;"></td>				
												<td style="text-align:center;vertical-align: top;"></td>								
												<th style="text-align:right !important;">Total (GBP) :</th>								
												<td style="text-align:center;vertical-align: top;">£'.$Course_balance_due.'.00</td>
											</tr>

											</table>
										</div>';

										
								$message .= '<div style="clear:both;"><br></div>';
								
								$message .= '<div style="text-align:center;width:100%;border:1px solid #d2d2d2;background:#d2d2d2;"><h4 style="color:#fff;margin-top: 0.6em;margin-bottom: 0.6em;">PAYMENTS</h4></div>';
								
								
								
								$message .= '					
								<div>		<p name="discountpercent" id="discountpercent" style="Display:NONE"> </p>
											<table class="col-md-12">
											<tr>
											</tr>
											<tr>
												<th style="width:33.3%">Date</th>							
												<th style="width:33.3%">Description</th>							
												<th style="width:33.3%">Amount</th>
											</tr>';
											
								$message .= '<tr id="LaunchDiscount_type" style="">	
												<td style="text-align:center;vertical-align: top;">'.$Invoicedate.'</td>				
												<td style="text-align:center;vertical-align: top;">PayPal</td>								
												<td style="text-align:center;vertical-align: top;">£'.$Course_balance_due.'.00</td>								
												<td style="text-align:center;vertical-align: top;"></td>
											</tr>							
											</table>
										</div></div>';
								$message .= '<div style="clear:both;"></div>
											<div>
												<center>
													<h2 style="color: #4556a0;margin-top: 0.83em;margin-bottom: 0em;">Thank you for your business!</h2>
													<div style="display: inline-flex;"><p style="color: #4556a0;">Agile Mindset Practices <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
													</div>
													<h2 style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited,</h2>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">First Floor Telecom House, 125-135 Preston Road,</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;"><a href="https://www.sprint0.com">www.sprint0.com</a>, support@sprint0.com</p>
													<h3 style="color: #4556a0;margin-top: 0.83em;margin-bottom: 0em;">Company No: 07553770. VAT No: 120092173.</h3>
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
								
								
						/**************Mail to bookings@sprint0.com  With all attendees Details********************/ 

								$from		= 'training@sprint0.com';
								$to 		= 'bookings@sprint0.com';
								$subject 	= 'Course Booking Confirmation - '.$course_name1.'';

								// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
								// Create email headers
									$headers .= 'From: '.$from."\r\n".
									'Reply-To: '.$from."\r\n" .
									'X-Mailer: PHP/' . phpversion();
								// Compose a simple HTML email message
								$message = '<html><body>';
								//$message .= '<h2 style="color:#4556a0;">Important- Course Booking Confirmation - '.$course_name.' </h2>';


								$message .= '<h3>Course Details</h3>';
								$message .= '<p>
													<ul id="c_details">
													<li>'.$course_name1.' </li>
													<li>'.$pCourse_Location.'</li>
													<li>'.$pCourse_Date.' </li>
													</ul>
												</p>';
								$message .= '<h3>Payee Details</h3>';
								$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';

								$message .= '<h3 >Course Attendee(s)</h3>';
												if(isset($fnames)){				
													if($fnames !=""){					
															$counter = count($fnames);
															$attendee =1;
														for($u=0;$u<$counter;$u++){
															$First_Name			=	$value['fname11'][$u];
															$Last_Name			=	$value['lname11'][$u];
															$Email_Address		=	$value['email11'][$u];
								$message .= '<p>'.$First_Name.' '.$Last_Name.', ' .$Email_Address.'</p>';
														}				
													}
												}else{			
								$message .= '<p>'.$payee_first_name.' '.$payee_last_name.', ' .$payment_email.'</p>';					}
								$message .= '<div style="clear:both;"></div>
											<div>
												<center>
													<h2 style="color: #4556a0;margin-top: 0.83em;margin-bottom: 0em;">Thank you for your business!</h2>
													<div style="display: inline-flex;"><p style="color: #4556a0;">Agile Mindset Practices <sup style="font-size: x-small;">TM</sup></p>&nbsp;<p> is a brand of Sprint 0 Solutions Ltd.</p>
													</div>
													<h2 style="margin-top: 0em;margin-bottom: 0em;">SPRINT 0 Solutions Limited,</h2>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">First Floor Telecom House, 125-135 Preston Road,</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;">Brighton, England BN1 6AF.</p>
													<p style="margin-top: 0.83em;margin-bottom: 0em;"><a href="https://www.sprint0.com">www.sprint0.com</a>, support@sprint0.com</p>
													<h3 style="color: #4556a0;margin-top: 0.83em;margin-bottom: 0em;">Company No: 07553770. VAT No: 120092173.</h3>
												</center>
											</div>';

								$message .= '</body></html>';

								mail($to, $subject, $message, $headers);
								
				/**************End Mail to bookings@sprint0.com With all attendees Details********************/
					?>
							<p><span style="color: #008000;">&nbsp;Payment Information :&nbsp;</span></p>
							<p style="padding-left: 30px;"><span style="color: #000000;">Order Date/Time : <?php echo $Order_date;?></span><br>
							<span style="color: #000000;"> Order ID : <?php echo $Course_Payee_ID2 ;?></span><br>
							<span style="color: #000000;"> Name : <?php echo $payee_first_name.' '.$payee_last_name;?></span><br>
							<span style="color: #000000;"> Email Address : <?php echo $payment_email;?></span><br>
							<span style="color: #000000;"> Amount &nbsp;: <?php echo $due_balance1;?></span><br>
							<span style="color: #000000;"> <!--Payee Authorisation Code : <?php //echo $Response['orderCode'];?>-->
							Payment Method : <?php echo $Payment_Method.'';?><br>
							</span></p>
							<p style="padding-left: 30px;">
							</p>
							
							<div class="fusion-clearfix"></div>
							</div>
						</div>
						<div class="fusion-one-half fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-video fusion-youtube" style="max-width:600px;max-height:350px;"><div class="video-shortcode"><iframe width="560" height="315" src="https://www.youtube.com/embed/OofJPkMzxP0" frameborder="0"></iframe></div></div><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-one-fifth fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:20px;padding-left:0px;padding-right:0px;"><style type="text/css" scoped="scoped">.fusion-fullwidth-1 {
						padding-left: 0px !important;
						padding-right: 0px !important;
						}</style><div class="fusion-row"></div></div>
						</div>
					</div>
				</div>
			</div>

			<style>
			ul{
				list-style-type:none;
			}
			</style>

			<?php
		}else{		
		
			echo "<center><h1>Invalid Request</h1></center><br>";
		
		}

	}else{
	
		echo "<center><h1>Invalid Request</h1></center><br>";
	
	}



get_footer();
?>