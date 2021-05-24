<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
/*
Template name:Confirmation_page_for_Worldpay 
*/
get_header();

// $file = file_get_contents('mydata.txt', true);
// $value = json_decode($file,true);
// echo "<pre>";
// print_r($value);

//email helper

require_once( get_stylesheet_directory() . '/templates/email-helper.php');

$payee_id = $_GET['pid'];

$Payment_Status = $_GET['Payment_Status'];

		if($Payment_Status == 'SUCCESS'){

			// $home_dir = '/public_html/sprint-stage/';
			$filename = 'Worldpay-'.$payee_id.'.txt';
			$files = file_get_contents( $filename, true);
			// var_dump($filename);
			// var_dump( file_exists($filename) );

			// var_dump($files);

			if($files != ''){
				
				$value = json_decode($files,true);
				// echo "<pre>";
				// print_r($value);

				$response_filename = 'WorldpayResponse-'.$payee_id.'.txt';
				$Res_file = file_get_contents($response_filename, true);

				$Response = json_decode($Res_file,true);
				//echo "<pre>";
				//print_r($Response);

				$paymentResponse= $Response['paymentResponse'];
				$cardholder_name =$paymentResponse['name'];

				$orderCode = $Response['orderCode'];

				//print_r($cardholder_name);


				//$CoursePayee_ID_file = file_get_contents('WorldpayCourse_Payee_ID.txt', true);
				$CoursePayee_ID = $payee_id;
				// echo "<pre>";
				// print_r($CoursePayee_ID);

				$payee_first_name						=	$value['payment_first_name'];
				$payee_last_name						=	$value['payment_last_name'];
				$payment_email							=	$value['email'];
				$payment_company						=	$value['payment_company'];
				$payment_phone							=	$value['payment_phone'];
				$payment_address1						=	$value['payment_address1'];
				$payment_address2						=	$value['payment_address2'];
				$payment_city							=	$value['payment_city'];
				$payment_state							=	$value['payment_state'];
				$bpostal_code							=	$value['bpostal_code'];
				$payment_country						=	$value['payment_country'];
				$pCourse_Date1							=	$value['pCourse_Date'];
				
				if($pCourse_Date1 != ''){
					$pCourse_Date							=	$pCourse_Date1.', ';
					$pCourse_Date2							=	$pCourse_Date1.'. ';
				}
				
				$Course_Price1							=	$value['Course_Price'];
				$Course_Price							=	$Course_Price1.'.00';
				$Course_total_Price						=	$value['Course_total_Price'];
				$pCourse_Location1						=	$value['pCourse_Location'];
				if($pCourse_Location1 != ''){
					$pCourse_Location						=	$pCourse_Location1.'.';
				}
				
				$pCourse_qty							=	$value['Course_qty'];
				$Launch_Discount						=	$value['Launch_Discount'];
				if($Launch_Discount != ''){
					$LaunchDiscount_type = 'Launch Discount';
					$Launch_Discount = '-£'.$Launch_Discount;
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
					$EarlyBirdDiscount = '-£'.$EarlyBirdDiscount;
				}else{
					?>
					<style>
					#EarlyBirdDiscount_type{
						display:none;
					}
					</style>
					<?
				}

				$Coupoun_MultipleAttendeeDiscount1		=	$value['Coupoun_MultipleAttendeeDiscount'];

				if($Coupoun_MultipleAttendeeDiscount1 != '' && $Coupoun_MultipleAttendeeDiscount1 != '0'){
					$MultipleAttendeeD_type = 'Multiple Attendee Discount';
					$Coupoun_MultipleAttendeeDiscount = '-£'.$Coupoun_MultipleAttendeeDiscount1;

				}else{
				?>	<style>
					#MultipleAttendeeD_type{
						display:none;
					}
					</style>
				<?
				}
				$Coupoun_Discount	=	$value['Coupoun_Discount'];


				if($Coupoun_Discount != ''){
					$Coupoun_Discount_type = 'Coupon Discount';
					$Coupoun_Discount = $Coupoun_Discount;

				}else{
				?>	<style>
					#Coupoun_Discount_type{
						display:none;
					}
					</style>
				<?
				}
				$Course_balance_due1					=	$value['Course_balance_due'];
				
				if($Course_balance_due1 != ''){
					
					$Course_balance_due					=	'£'. $Course_balance_due1;
				}
								
				$hiddenVAT								=	$value['hiddenVAT'];
				$fnames 								= 	$value['fname11'];		
				$due_balance							=	$value['amount'];
				$course_name1							=	$value['Course_Name'];
				
				if($course_name1 != ''){
					$course_name				=	$course_name1.',';
					$Payment_Method				=	 'WorldPay Credit Card';
					$Order_date					=	date("d F Y H:i:s");
					$date1						=	date('F d, Y');
					$Invoicedate				=	date('F d, Y');
				}
				$courseid								=	$value['Course_ID'];
				$excl_vat								=	$value['excl_vat'];
				$VAT_Amount								=	$value['hiddenVAT'];
				$pond_sign_d= '-£';

				if($VAT_Amount<1){
						$VAT_Amount = 0;
					}

					// var_dump($value);

				
 
				// file_put_contents('Worldpay.txt','');
				// file_put_contents('WorldpayResponse.txt','');
				// file_put_contents('WorldpayCourse_Payee_ID.txt','');

				

				//require_once( get_template_directory() . '/templates/email-helper.php');

				$courseDetails 		= compact(
										"course_name1",
										"course_name",
										"pCourse_Location1",
										"pCourse_Date2"
										);

				//$attendeeDetails 	= compact("fnames");

				if(isset($fnames)){				
					if($fnames !=""){
						$counter = count($fnames);

						$attendeeDetails = array();

						for($u=0;$u<$counter;$u++){
			
								$attendeeDetails[$u]['firstName']	=	$value['fname11'][$u];
								$attendeeDetails[$u]['lastName']  	=	$value['lname11'][$u];
								$attendeeDetails[$u]['email'] 		=	$value['email11'][$u];

							}

					}
				}



				$paymentDetails 	= compact( 
										"date1",
										"Order_date",
										"CoursePayee_ID",
										"payee_first_name",
										"payee_last_name",
										"payment_email",
										"payment_company",
										"payment_address1",
										"payment_address2",
										"payment_city",
										"payment_state",
										"payment_country",
										"Course_Price",
										"Course_total_Price",
										"LaunchDiscount_type",
										"Launch_Discount",
										"MultipleAttendeeD_type",
										"Coupoun_MultipleAttendeeDiscount",
										"Coupoun_Discount_type",
										"Coupoun_Discount",
										"EarlyBirdDiscount_type",
										"EarlyBirdDiscount",
										"excl_vat",
										"hiddenVAT",
										"Course_balance_due",
										"orderCode",
										"cardholder_name",
										"Course_balance_due1",
										"Payment_Method"
									);


			?>

			<div class="fusion-row" style="">
				<div id="content" style="width:100%">
					<div id="post-12877" class="post-12877 page type-page status-publish hentry">
						
						<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
							<div class="fusion-column-wrapper">
								<div class="fusion-title title fusion-title-size-one">
									<h1 class="title-heading-left" data-fontsize="34" data-lineheight="48"><?php echo $course_name1;?> Booking Confirmation.</h1><div class="title-sep-container">
									<div class="title-sep sep-double"></div>
									</div>
								</div>
								<p>Thank you for booking <?php echo $course_name1;?> course. Please find your booking details below. An email confirmation of your booking has been sent to you. Please check and keep this safe. Additionally, information on the exact location, together with directions will be sent to you in advance of the course.</p><div class="fusion-clearfix"></div>
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
							<p style="padding-left: 30px;">
								<ul>
									<li><span style="color: #000000;">Course Name: <?php echo $course_name1;?></span></li>
									<li><span style="color: #000000;">Course Date: <?php echo $pCourse_Date;?></span></li>
									<li><span style="color: #000000;">Course Location: <?php echo $pCourse_Location; ?></span></li>
								</ul>
							</p>
							
							
							<p><span style="color: #008000;"><strong>&nbsp;</strong>Attendee Information :&nbsp;</span></p>
							
							
							
							<?php 
							
							$fnames = $value['fname11'];
							if($fnames){
								
								if($fnames !=""){

									$counter = count($fnames);
									$attendee =1;


									for($u=0;$u<$counter;$u++){					

										$First_Name			=	$value['fname11'][$u];
										$Last_Name			=	$value['lname11'][$u];
										$Email_Address		=	$value['email11'][$u];	


										/******************Email To Multiple Attendees seprately**************/
										// To : Attendees sepretly (if multiple attendees) 

										email_attendee_booking_confirmation(
																				$First_Name, 
																				$Last_Name, 
																				$Email_Address, 
																				$courseDetails, 
																				$paymentDetails
																			);

										/****************End Email To Multiple Attendees seprately**************/

										?>
									<ul style="padding-left: 30px;color: #000;">
										<p><span style="color: #000000;"><li>Name : <?php echo $First_Name.' '.$Last_Name;?></li></span>
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


										email_payee_attendee_details($courseDetails, $attendeeDetails, $paymentDetails);


										/**************End Mail to Payee With all attendees Details********************/ 
										
										
										/**************Invoice to Payee********************/ 

										email_payee_invoice($courseDetails, $paymentDetails);
												
										
				/**************Mail to bookings@agilemindsetpractices.com  With all attendees Details********************/ 

										email_admin_bookinginfo($courseDetails, $attendeeDetails, $paymentDetails)

				/**************End Mail to bookings@agilemindsetpractices.com With all attendees Details********************/
							
							?>
							<p><span style="color: #008000;">&nbsp;Payment Information :&nbsp;</span></p>
							<p style="padding-left: 30px;"><span style="color: #000000;">Order Date/Time : <?php echo $Order_date;?></span><br>
							<span style="color: #000000;"> Order ID : <?php echo $CoursePayee_ID;?> </span><br>
							<span style="color: #000000;"> Name : <?php echo $payee_first_name.' '. $payee_last_name;?></span><br>
							<span style="color: #000000;"> Email Address : <?php echo $payment_email;?></span><br>
							<span style="color: #000000;"> Cardholder Name : <?php echo $cardholder_name;?></span><br>
							<span style="color: #000000;"> Amount &nbsp;: <?php echo $Course_balance_due;?></span><br>
							<span style="color: #000000;"> Payee Authorisation Code : <?php echo $Response['orderCode'];?><br>
							Payment Method : <?php echo $Payment_Method.'';?> <br>
							</span></p>
							<p style="padding-left: 30px;">
							</p>
							
							<div class="fusion-clearfix"></div>
							</div>
						</div>
						<div class="fusion-one-half fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-video fusion-youtube" style="max-width:600px;max-height:350px;">
							
							<div class="video-shortcode">
							<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/OofJPkMzxP0" frameborder="0"></iframe>
							-->
								</div>
							</div><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-one-fifth fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:20px;padding-left:0px;padding-right:0px;"><style type="text/css" scoped="scoped">.fusion-fullwidth-1 {
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
			
				echo "<center><h1>Invalid Request</h1><br></center>";
			
			 }

		}else{
	
		echo "<center><h1>Invalid Request</h1></center><br>";
	
	}

				unlink($filename);
				unlink($response_filename);

get_footer();
?>