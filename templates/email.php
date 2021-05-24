<?php 


// $file = file_get_contents('mydata.txt', true);
// $value = json_decode($file,true);
// echo "<pre>";
// print_r($value);
//$Payment_Status = $_GET['Payment_Status'];
		$Payment_Status = 'SUCCESS';
		//if($Payment_Status == 'SUCCESS'){
	
			$file = file_get_contents('mydata.txt', true);

			$value = json_decode($file,true);

			echo "<pre>";
			print_r($value);

				
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
			$Course_Price1							=	$value['Course_Price'];
			echo $Course_Price							=	$Course_Price1.'.00';
			$pCourse_Location						=	$value['pCourse_Location'];
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
			$course_name							=	$value['item_name'];
			$courseid								=	$value['Course_ID'];
			$date1									=	date('Y-m-d');
			$Invoicedate							=	date('F d, Y');
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
			$Order_date					=	date("d F Y H:i:s");
			$Payment_Method				=	 'PayPal';
				@mysql_connect("localhost","sprint00_agdb",",dx{5^VB0k1f)");
				@mysql_select_db("sprint00_agdb");
				
				$Course_Payee_ID	=	mysql_query("SELECT Course_Payee_ID FROM h8z_AMP_Data_Course_Payee WHERE Email = '$payment_email' ORDER BY Course_Payee_ID DESC  ");
			
					$Course_Payee_ID1	=	mysql_fetch_row($Course_Payee_ID);	
					
					$Course_Payee_ID2	=	$Course_Payee_ID1[0];

		//}


					/**************Invoice to Payee********************/ 

							$from		= 'training@sprint0.com';
							//echo $to 		= 'support@sprint0.com';
							// $to 		= $payment_email;
							 $to 		= 'vishawkarma2016@gmail.com';
							//$to 		= 'rakeshvishawkarma20@hotmail.com';
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
							
							$message .= '<div style="border:1px solid #d2d2d2;padding: 10px;margin: 1% 10% 0% 10%;">';
							/*float left*/
							
							$message .= '<div style="float:left;width:40%;">';					
							$message .= '<ul style="padding-left: 20px;">
											<p id="p_details"><strong>Date:   </strong>'.$date1.'</p>
											<p id="p_details"><strong>Type:	</strong>Receipt</p>
											<p id="p_details"><strong>Login:	</strong>'.$Course_Payee_ID2.'</p>
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
											<td style="text-align:center;vertical-align: top;">x'.$pCourse_qty.'  '.$course_name.'</td>								
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
											<th style="text-align:right !important;">Total(GBP):</th>								
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
							echo $message .= '</body></html>';

							//mail($to, $subject, $message, $headers);
					


?>
<style>
ul{
	list-style-type:none;
}
</style>