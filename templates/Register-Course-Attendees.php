<?php 
/*
Template name: Payment_page
*/

/* dev note 

	1. enable McFee validation
	>2. change db config path
*/


get_header();
?>
<?php

	require_once('/home/customer/www/staging1.sprint0.com/db-config/config-sprint.php');

	$Course_ID		= $_GET['Course_ID'];

	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	
	$qry1=mysqli_query($con, "SELECT * FROM h8z_SPR_Data_Course_Details where Course_ID = '$Course_ID' ");
	
	$result=mysqli_fetch_array($qry1);	

	$Course1 			= 	$result['Course_Name'];
	$Location			=	$result['Course_Location'];
	$Dates				=	$result['Course_Date'];
	$Date 				= 	strtotime("$Dates");
	$de					=	date("d F Y ", $Date);
	$duration 			=   $result['Duration'];
	$Price				=	$result['Course_Cost'];	
	$Status				=	$result['Status'];

	if ( $duration > 1 ) {
		$currentdate		=	date("d", $Date);
		$next_date 			= 	date('d', strtotime($de.' +'.($duration - 1).' day'));
		$next_month_year	=	date("F Y", $Date);
		$Dates1				= 	$currentdate.'-'.$next_date.'th '.$next_month_year;
	} else {
		$Dates1				= 	$de;
	}

	//var_dump($result);
	
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

<div id="AttendingPage" class="col-md-12 col-lg-12">
	<form name="AttendeeForm" id="AttendeeForm" action="<?php echo home_url();?>/register-course-payment?Course_ID=<?php echo $Course_ID;?>" method="POST" >
	<div class="col-md-8 col-lg-8" >
		<div class="col-md-12 col-lg-12">
			<div class="col-md-12 col-lg-12">
			<h3 class="heading">Course Selected</h3>
				<p class="selected_course"><?php echo $Course1 .', '.$Dates1.', '.$Location .'.'; ?></p>
			</div>
				<input type="hidden" name="Course_name" value="<?php echo $Course1; ?>">
				<input type="hidden" name="Course_ID" value="<?php echo $Course_ID; ?>">
				<input type="hidden" name="Course_Date" value="<?php echo $Dates1; ?>">
				<input type="hidden" name="Course_Location" value="<?php echo $Location; ?>">	
		</div>		
		<div style="clear:both;"></div>		
		<div id="Attendent">
				<div class="block" id="Attendent-list"> 
				<div style="clear:both;"></div>				
					<div class="col-md-12 col-lg-12">
						<div class="col-md-12 col-lg-12">
							<h3 class="heading">Who's Attending?</h3>
						</div>
												
						<div class="col-md-3 col-lg-3">
							<label for="first_name">First Name<span class="">*</span></label><br>
							<input id="first_name" value="" class="field" name="fname[]" type="text" placeholder="First Name" required=""><br>
							<p id="FNameerror"></p>
						</div>
						<div class="col-md-3 col-lg-3">
							<label for="last_name">Last Name<span class="">*</span></label><br>
							<input id="last_name" value="" class="field" name="lname[]" type="text" placeholder="Last Name" required="">
							<p id="LNameerror"></p>
						</div>
						<div class="col-md-6 col-lg-6">
							<label for="email">Email<span class="">*</span></label><br>
							<input id="email" value="" class="field" type="email" name="email[]" placeholder="me@example.com" required="">
							<p id="Emailerror"></p>
						</div>
					</div>
					<div style="clear:both;"></div>					
					<div class="col-md-12 col-lg-12"><br></div>					
					<div style="clear:both;"></div>			
					<div class="col-md-12 col-lg-12">
						<div class="col-md-12 col-lg-12"><br><hr><br></div>
					</div>					
				</div>
			<div class="col-md-12 col-lg-12"><br></div>
			<div class="col-md-12 col-lg-12" id="Buttons_person">
				<div class="col-md-12 col-lg-12">
				<fieldset id="add_another_person" class="add-person">
					<input type="button"  name="add_person_button" class="add_person_button button-ghost" id="add_person_button" value="Add Another Person">
					
				</fieldset>
				<p id="discountdisablestatusadd" style="color:red;width: 269px;"></p>
				</div>
				
				<!-- ----Start DiscountCode Field ------- -->
			
				<div style="clear:both;"></div>	
				
				<div class="col-md-12 col-lg-12"> 
					<h3 class="heading">Discount</h3>
					<div class=""> 
					<p id="discountErrore" style="">Please only apply any discount code after completing all attendee information.</p>
					</div>	
					<div class="col-md-3 col-lg-3" style="line-height: 2.4;padding: 0px;">
						<label for="first_name">Discount Code </label><br>
					</div>					
					<div class="col-md-4 col-lg-4" style="line-height: 2.9;margin-bottom:20px;">
						<input id="DiscountCode" value="" class="field" name="DiscountCode" type="text" placeholder="Discount Code" >
						<center><p id="discountError" style="font-weight: 600;"></p></center>
					</div>														
					<div class="col-md-5 col-lg-5">
						<fieldset id="add_another_persons" class="add-person">
						<input type="button" name="Discountbutton" class="button-ghost" id="Discountbutton" value="Apply Discount Code">
						</fieldset>
					</div>
				</div>
						

				<!-- ----End DiscountCode Field ------- -->	

				<div class="col-md-12 col-lg-12"><br><br></div>				
				<div style="clear:both;"></div>				
				<div class="col-md-12 col-lg-12" style="display: inline;">
					<input name="pay_order_button" id="pay_order_button" class="button submitable" type="submit" value="Proceed to Payment">
					&nbsp;or <a id="course-632" href="https://www.sprint0.com/">Cancel</a> 
					<br><br>
				</div>				
				<div style="clear:both;"><br></div>				
				<div>  
				</div>
			</div>	
		</div>		
	</div>
	<div class="col-md-4 col-lg-4" >	
		<div style="clear:both;"></div>		
		
		<div class="col-md-12 col-lg-12" >
			<div class="col-md-12 col-lg-12">
			<h3 class="text-center discountheading-hl">Discounts Available</h3>
			</div>
			<div style="clear:both;"></div>	
			<div class="discount text-small no-padding-leader has-trailer">
				<div class="text-left">
					<h4 class="no-trailer" style="color: #4CAF50 !important;">Multiple Attendee Discounts</h4>
					<p>
						<strong>2 - 3 </strong> &nbsp;&nbsp;Save <strong>£</strong>50 per person<br>
						<strong>4 - 5 </strong> &nbsp;&nbsp;Save <strong>£</strong>100 per person<br>
						<strong>6 - 7+ </strong> Save <strong>£</strong>150 per person<br>
					</p>
					<!-- <?php
						
						$qry=mysqli_query($con, "SELECT * FROM h8z_SPR_Config_Multi_Attendee_Discount WHERE Enabled_YN = 'Y'");


						while($row=mysqli_fetch_row($qry))
							{
					?>			<p>
									<?php
										if($row[1] >= 3){
									?>
												<strong><?php echo $row[1].' or '.$row[1].'+'; ?></strong> 
												Save <?php echo '<strong>£</strong>'.$row[2]; ?> per person
												<br>
									<?php	}
										else{
									?>
												<strong><?php echo $row[1]; ?></strong> 
												Save <?php echo '<strong>£</strong>'.$row[2]; ?> per person
												<br>
									<?php	}
									?>
								</p>
					<?php					
							}
					?> -->
				</div>
			</div>
			<br>
		</div>
				
		<div style="clear:both;"></div>
		
		<div class="col-md-12 col-lg-12"></div>		
		<div style="clear:both;"></div>	
			<div class="col-md-12 col-lg-12">
			<div class="col-md-12 col-lg-12" style="border: 1px solid #d2d2d2;">
				<div id="payment_total" class="sidebar-section">	
						<h3 class="text-center heading-hl" style="color:#f09e0e !important;">Summary</h3>
						<hr style="color:#d2d2d2;">
					<div id="totals" class="text-small">
					<!-- reg/orders/summary_table -->
							<div id="summary-table">
								<p name="discountpercent" id="discountpercent" style="Display:NONE"> </p>
								<table class="col-md-12">
								<tr>
								</tr>
								<tr>
									<th style="width: 50%;"> 
									<input type="hidden" name="Course_Name" value="<?php echo $Course1; ?>">
									<strong><?php echo $Course1; ?></strong>
									</th>
									<input type="hidden" name="Course_qty" id="Course_qty" value="×1">
									<td class="qty" id="qty"> ×1<span>&nbsp;&nbsp;</span> </td>
									<input type="hidden" name="Course_Price" value="<?php echo '£'.$Price; ?>">
									<td class="Price" id="Price"><?php echo '£'.$Price; ?></td>
								</tr>								
								<tr id="trCourse_total_Price" style="display:none;">
									<input type="hidden" name="Course_total_Price" id="Course_total_Price" value="<?= $Price ?>">
									<th colspan="2"><strong>Total Course Price</strong></th>
									<td id="total"><?php echo '£'.$Price; ?></td>
								</tr>
								<?php

										$total_discount = 0;

										$qry5		=	mysqli_query($con, "SELECT * FROM h8z_SPR_Status_Discount_Code where Status_Name = '$Status' ");
										$result5	=	mysqli_fetch_row($qry5);	
										$status_dis	=	$result5[2];
										$status_name=	$result5[1];

										//var_dump($result5);
										
										if($status_dis > 0 && $status_name == "Early Bird Discount"){

											$EarlyBirdDiscountRate = $status_dis;

											$EarlyBirdDiscount = $Price * ($status_dis/100);

											$total_discount .=  $EarlyBirdDiscount;


								?>		
											<tr class="EarlyBirdDiscount">
												<input type="hidden" name="database_Early_Bird_Discount" id="database_Early_Bird_Discount" value="<?php echo $status_dis;  ?>">
												<th colspan="2">Early Bird Discount</th>
												
												<input type="hidden" name="EarlyBirdDiscount" id="EarlyBirdDiscount" value="<?php echo '-£'.$status_dis; ?>">
												
												<td id="EarlyBirdDiscountt"><?php echo '-£'.$EarlyBirdDiscount; ?></td>
											</tr>
											
								<?php
										}
										if($status_dis > 0 && $status_name == "Launch"){

											$LaunchDiscountRate = $status_dis;

											$LaunchDiscount = $Price * ($LaunchDiscountRate/100);

											$total_discount .=  $LaunchDiscount;
								?>	
											<tr class="LaunchDiscount">
												<input type="hidden" name="database_Launch_Discount" id="database_Launch_Discount" value="<?php echo $status_dis;  ?>">
												<th colspan="2">Launch Discount</th>
												<input type="hidden" name="database_Launch_Discount" id="database_Launch_Discount" value="<?php echo $status_dis;  ?>">
												<input type="hidden" name="Launch_DiscountT" id="Launch_DiscountT" value="<?php echo '-£'. $LaunchDiscount; ?>">
												<td id="LaunchDiscount"><?php echo '-£'.$LaunchDiscount; ?></td>
											</tr>
								<?php
										}


										//Pricing

										// $balance = $price;

										$TotalBeforeVat = $Price - $total_discount;

										$vat_payable = $TotalBeforeVat * 0.20; // 20% vat

										$TotalAfterVat = $TotalBeforeVat + $vat_payable;



								?>	
								<tr class="class_discount" id="class_discount" style="display:none;">	
									<input type="hidden" id="Coupoun_Discount" name="Coupoun_Discount" value="">
									<th colspan="2">Coupon Discount</th>
									<td id="coupoun-discount">-£0</td>
								</tr>
								<tr class="Multiple_class_discount" id="Multiple_class_discount">
									<input type="hidden" id="Coupoun_MultipleAttendeeDiscount" name="Coupoun_MultipleAttendeeDiscount"  value="0">
									<th colspan="2">Multiple Attendee Discount</th>
									<td id="MultipleAttendeeDiscount">£0</td>
								</tr>
								<tr class="Total_VAT" id="Total_VAT">
									<input type="hidden" id="excl_vat" name="excl_vat"  value="<?= $TotalBeforeVat ?>">
									<th colspan="2">Total (excl VAT)</th>
									<td id="exclVAT"><?php echo '£'. $TotalBeforeVat; ?></td>
								</tr>
								<tr class="class_VAT" id="class_VAT">
									<input type="hidden" id="hiddenVAT" name="hiddenVAT"  value="<?= $vat_payable ?>">
									<th colspan="2">VAT (20%)</th>
									<td id="VAT"><?php echo '+£'. $vat_payable; ?></td>
								</tr>
								<tr class="po-unpaid">
									<input type="hidden" name="Course_balance_due" id="Course_balance_due" value="<?= $TotalAfterVat ?>">
									<th colspan="2"><strong>Balance Due</strong></th>
									<td id="balance-due">
									<?php echo '£'. $TotalAfterVat; ?>
									</td>
								</tr>
								</table>
							</div>
					</div>
				</div>
				<br>
			</div>
			</div>
		<div style="clear:both;"><br></div>	
		<div class="col-md-12 col-lg-12">
			<div class="mfes-w297">
			<p class="has-leader text-small cc">


				<script src="https://cdn.ywxi.net/js/inline.js?t=103"></script>
				<!-- <img class="mfes-trustmark mfes-trustmark-hover" border="0" src="/wp-content/themes/Avada-Child-Theme/images/104.png" width="320" height="40" title="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams"> -->
			</p>
			</div>
		</div>
		
		<div style="clear:both;"></div>
		<div class="col-md-12 col-lg-12">
			<p class="has-leader text-small cc" style="float:right;">We accept: <img src="/wp-content/uploads/2017/04/Payicon2.png" alt="Credit Card Icons" style="height:30px;"></p>
		</div>			
					
		<div style="clear:both;"><br></div>	
		
		<div class="col-md-12 col-lg-12">
			<div class="col-md-12 col-lg-12" style="border: 1px solid #d2d2d2;">
				<div class="text-small">
					<h3 class="text-center heading-hl">Refund Policy</h3>
					<hr style="color:#d2d2d2;">
				</div>
			Where a booking is cancelled 15 working days or more before the course starts, a full refund will be made. Where cancellations are made between 12-14 working days before the course starts, the attendee may join a later class, or receive a 70% refund. Unfortunately due to costs, course cancellations within the last 11 days are not refundable. For Refunds please email <a href="mailto:support@sprint0.com">support@sprint0.com</a>
			</div>
		</div>
		<div style="clear:both;"><br></div>
	</div>
	</form>
</div>

<!-- ----End AttendingPage--------- <--></-->


<style>
hr{
	display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;
}
.heading{
	font-weight: 400;
	color: #4556a0;
	font-size: 1.25rem;
	line-height: 35px;
}
.selected_course{
	font-weight: 400;
	font-size: 1.2rem;
	color:#000;
}
.no-trailer {
    font-size: 1rem;
    line-height: 28px;
	color: #4556a0;
}
label {
    display: block;
    float: none;
    width: auto;
    margin: 0;
    font-weight: bold;
    padding: 4px 0;
}
input[type="email"] {
    border: 1px solid #d2d2d2;
    font-size: 13px;
    color: #747474;
    padding: 8px 15px;
    margin-right: 1%;
    width: 100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
	outline: none;
}
input[type="tel"] {
    border: 1px solid #d2d2d2;
    font-size: 13px;
    color: #747474;
    padding: 8px 15px;
    margin-right: 1%;
    width: 100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
	outline: none;
}
select:focus{
	border:0.1px solid #4556a0;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	outline: -webkit-focus-ring-color #4556a0 1px;
}
input[type="text"]:focus{
	border:0.1px solid #4556a0;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	outline: -webkit-focus-ring-color #4556a0 1px;
}
input[type="email"]:focus{
	border:0.1px solid #4556a0;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	outline: -webkit-focus-ring-color #4556a0 1px;
	
}
ul{
	list-style-type:none;
}
.heading-hl {
    color: #4556a0 !important;
	font-weight: 400;
	font-size: 1.25rem;
	line-height: 10px;
    padding-left: 5px;
}
.discountheading-hl {
    color: #4CAF50 !important;
	font-weight: 400;
	font-size: 1.25rem;
	line-height: 35px;
    
}
.button-ghost {
    background-color: white;
	color: #4556a0 !important;
    border-color: white;
    padding-top: 0.5em;
    padding-bottom: 0.5em;
    -moz-transition: all 0.25s;
    -o-transition: all 0.25s;
    -webkit-transition: all 0.25s;
    transition: all 0.25s;
    font-size: 0.85rem;
    line-height: 23.8px;
    border-radius: 4px;
    padding-left: 1.5em;
    padding-right: 1.5em;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border: none;
    text-align: center;
    font-family: "interface", sans-serif;
    white-space: pre-wrap;
    border: 1px solid #4556a0;
}
input[type="text"]{
	margin-right: 0%;
	color: #747474;
	outline: none;
	
}
.button {
    background-color: #4556a0;
    color: white !important;
    border-color: #4556a0;
    padding-top: 0.5em;
    padding-bottom: 0.5em;
    -moz-transition: all 0.25s;
    -o-transition: all 0.25s;
    -webkit-transition: all 0.25s;
    transition: all 0.25s;
    font-size: 0.85rem;
    line-height: 23.8px;
    border-radius: 4px !important;
    padding-left: 1.5em;
    padding-right: 1.5em;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border: none;
    text-align: center;
    font-family: "interface", sans-serif;
    white-space: pre-wrap;
}
.discount {
    border-radius: 6px;
    text-align: center;
	padding: 1em 2em;
    border: 2px dashed #4CAF50;
    background-color: white;
}
.no-trailer {
    margin-bottom: 0 !important;
	margin-top: 0 !important;
}
.text-left  {
    text-align: left;
}
.text-left p {
	margin: 0px;
}
table th, table td {
    padding: .5em;
    border-bottom: 1px solid #eeeeee;
    vertical-align: top;
    text-align: left;
}
#payment_total td.qty {
    color: #666666;
    text-align: right;
    padding-right: 0;
}
#payment_total td {
    text-align: right;
    padding-left: 0;
}
label {
    display: block;
    float: none;
    width: auto;
    font-size: medium;
    margin: 0;
	font-weight: normal;
    padding: 4px 0;
}
.error{
	color:red;
	text-align:center;
}
.field{
	text-align:center;
}
</style>

 <script>
		jQuery("#AttendeeForm").validate({});
		
		// Specify the validation rules
		jQuery("[name^=fname]").each(function () {
				jQuery(this).rules("add", {
					required: true,
					letterswithbasicpunc: true,
					 messages: {
					   letterswithbasicpunc: "Please enter a valid first name",
					  }
				});
			});
			jQuery("[name^=lname]").each(function () {
				jQuery(this).rules("add", {
					required: true,
			  		letterswithbasicpunc: true,
			  		 messages: {
					   letterswithbasicpunc: "Please enter a valid last name",
					  }
				});
			});
			
			jQuery("[name^=email]").each(function () {
				jQuery(this).rules("add", {
					required: true,
			  		email: true,
				});
			});

jQuery(document).ready(function(){
	 jQuery('form#AttendeeForm').on('submit', function(event) {

            	// Specify the validation rules
		jQuery("[name^=fname]").each(function () {
				jQuery(this).rules("add", {
					required: true,
					letterswithbasicpunc: true,
					 messages: {
					   letterswithbasicpunc: "Please enter a valid first name",
					  }
				});
			});
			jQuery("[name^=lname]").each(function () {
				jQuery(this).rules("add", {
					required: true,
			  		letterswithbasicpunc: true,
			  		 messages: {
					   letterswithbasicpunc: "Please enter a valid last name",
					  }
				});
			});
			
			jQuery("[name^=email]").each(function () {
				jQuery(this).rules("add", {
					required: true,
			  		email: true,
				});
			});      

            // test if form is valid 
            if(jQuery('form#AttendeeForm').validate().form()) {
                console.log("validates");
            } else {
                console.log("does not validate");
            // prevent default submit action  
               event.preventDefault();
            }
        })
	 jQuery('form#AttendeeForm').validate();
});


			function passValidation(){
						// Specify the validation rules
				jQuery("[name^=fname]").each(function () {
						jQuery(this).rules("add", {
							required: true,
							letterswithbasicpunc: true,
							 messages: {
							   letterswithbasicpunc: "Please enter a valid first name",
							  }
						});
					});

					jQuery("[name^=lname]").each(function () {
						jQuery(this).rules("add", {
							required: true,
					  		letterswithbasicpunc: true,
					  		 messages: {
							   letterswithbasicpunc: "Please enter a valid last name",
							  }
						});
					});
					
					jQuery("[name^=email]").each(function () {
						jQuery(this).rules("add", {
							required: true,
					  		email: true,
						});
					});
					jQuery("#AttendeeForm").valid();
			}

jQuery(document).ready(function(){

	jQuery('#first_name').attr('name', 'fname');
	jQuery('#last_name').attr('name', 'lname');
	jQuery('#email').attr('name', 'email');
	
	jQuery('#Multiple_class_discount').hide();
	jQuery('#class_discount').hide();
	
	var discountdisablestatus	=	false;
	var netdiscount;
	var LaunchDiscount77;
	var LaunchDiscount78;
	var EarlyBirdDiscountt77;
	var EarlyBirdDiscountt78;
	var personcounter	=	1;
	var kk = 0;
	var discountamount11;
	var dueamt55;
	var total55;
	var total56;
	var total57;
	var Launch_Discount1;
	var Early_Bird_Discount1;	
	var Launch_Discount2;
	var Early_Bird_Discount2;
	var VAT;
	var vatamtexclusivevat;
	var calvat151;

	var Launch_Discount 		= 0;	
	var Early_Bird_Discount	 	= 0; 
	
	

//////////////////////////////////////////////////////////
//////////// FUNCTION TO ADD NEW PERSON //////////////////
//////////////////////////////////////////////////////////
function curFormat(number){
	return number.toLocaleString('en-GB', { style: 'currency', currency: 'GBP', minimumFractionDigits: 0, maximumFractionDigits: 0 });
}
jQuery('.add_person_button').click(function() {

	if( passValidation() ){
		//console.log("validation pass");
	} else {
		//console.log("validation fail");
	}
	// jQuery("#AttendeeForm").valid();
	
	jQuery('#first_name').attr('name', 'fname[]');
	jQuery('#last_name').attr('name', 'lname[]');
	jQuery('#email').attr('name', 'email[]');
	
	
	if(discountdisablestatus == false){
		var checkvalidfuncton= jQuery("#AttendeeForm").valid();

			
			if(checkvalidfuncton == true){
				
			
			personcounter++;
			
			jQuery.ajax({
				type: "POST",
				url: "/wp-content/themes/Avada-Child-Theme/templates/discountonaddingmember.php",
				data: {
					personcounter1: personcounter,		
				},
				success: function (resp) {				
						jQuery('#MultipleAttendeeDiscount').html('-£'+resp);
						jQuery('#Multiple_class_discount').show();

						jQuery('#Coupoun_MultipleAttendeeDiscount').val(resp);
						
						adjustvalues(resp);
					},
			});

			function curFormat(number){
				return number.toLocaleString('en-GB', { style: 'currency', currency: 'GBP', maximumFractionDigits:0, minimumFractionDigits:0 });
			}
				
			function adjustvalues(abc){
				discountamount11	=	abc;		
				var qtyy=jQuery('#qty').html('×'+personcounter+'&nbsp;&nbsp;');
				jQuery('#Course_qty').val('×'+personcounter+'&nbsp;&nbsp;');
				var price11 = jQuery('#Price').html();
				price11 	= parseInt(price11.replace('£',''));		
				var total11			=	personcounter * price11;
						
				
				LaunchDiscount77 		= 	jQuery('#database_Launch_Discount').val();
				
				if(LaunchDiscount77 != undefined){
					LaunchDiscount78 		=	(total11 * LaunchDiscount77)/100;			
					jQuery('#LaunchDiscount').html('-£'+LaunchDiscount78);
					jQuery('#Launch_DiscountT').val(LaunchDiscount78);
				}
				else{
					LaunchDiscount78	=	0;
				}		
				
				EarlyBirdDiscountt77	=	jQuery('#database_Early_Bird_Discount').val();

				if(EarlyBirdDiscountt77 != undefined){
					EarlyBirdDiscountt78 	=	(total11 * EarlyBirdDiscountt77)/100;			
					jQuery('#EarlyBirdDiscountt').html('-£'+EarlyBirdDiscountt78);
					jQuery('#EarlyBirdDiscount').val(EarlyBirdDiscountt78);
				}
				else{
					EarlyBirdDiscountt78	=	0;			
				}
				
				netdiscount		=	LaunchDiscount78 + EarlyBirdDiscountt78;	
				var totaldis77	=	parseInt(discountamount11) + netdiscount;		
				var dueamount11	=	(personcounter * price11) - totaldis77;
						
				jQuery('#total').html( '£'+total11 );
				
				jQuery('#Course_total_Price').val( total11 );
				
				VAT			=	parseInt((dueamount11 * 1)/5);
				
				jQuery('#VAT').html( curFormat(VAT) );
				jQuery('#hiddenVAT').val(VAT);
				
				jQuery('#exclVAT').html( curFormat(dueamount11) );
				jQuery('#excl_vat').val( dueamount11 );
				
				dueamount11	=	dueamount11+VAT;
			
				jQuery('#balance-due').html( curFormat(dueamount11) );	
				jQuery('#Course_balance_due').val(dueamount11);
				jQuery('#trCourse_total_Price').show();
				
			}
			
			var aaa=jQuery('.block:last').after('<div class="block" id="Attendent-list" style="clear: both;"><div style="clear:both;"><div class="col-md-12"><div class="col-md-3"><label for="first_name">First Name<span class="">*</span></label><input id="first_name_'+personcounter+'" value="" class="field fname" name="fname['+personcounter+']" type="text" placeholder="First Name" required=""><p id="FNameerror"></p></div><div class="col-md-3"><label for="last_name">Last Name <span class="">*</span></label><input id="last_name_'+personcounter+'" value="" class="field lname" name="lname['+personcounter+']" type="text" placeholder="Last Name" required=""><p id="LNameerror"></p></div><div class="col-md-6"><label for="email">Email <span class="">*</span></label><input id="email_'+personcounter+'" value="" class="field email" type="email" name="email['+personcounter+']" placeholder="me@example.com" required=""><p id="Emailerror"></p></div></div></div><div class="col-md-12"><br></div><div style="clear:both;"></div><div class="col-md-12"><br><br></div><div style="clear:both;"><div class="col-md-12"><div class="col-md-4"><input type="button" name="delete_person_button" id="remove_registrant_36391" class="delete_person_button button-ghost" value="Remove this Person"></a></div><div class="col-md-12"><p id="discountdisablestatus" style="color:red;clear:both;"></p></div></div></div><div class="col-md-12"><div class="col-md-12"><br><hr><br></div></div></div>');
			
		
			
			}
	}else{
		jQuery('#discountdisablestatusadd').html('Cannot add attendees after applying discount');
		//alert('Cannot add attendees after applying discount');
	}
});



//////////////////////////////////////////////////////////
//////////// FUNCTION TO REMOVE PERSON //////////////////
//////////////////////////////////////////////////////////

jQuery('#Attendent').on('click','.delete_person_button',function() {
	if(discountdisablestatus === false){
	
		personcounter--;
	
		jQuery.ajax({
			type: "POST",
			url: "/wp-content/themes/Avada-Child-Theme/templates/discountonremovingmembers.php",
			data: {
				personcounter1: personcounter
			},
			success: function (resp) {				
					jQuery('#MultipleAttendeeDiscount').html('-£'+resp);
					jQuery('#Coupoun_MultipleAttendeeDiscount').val(resp);
					
					adjustvalues(resp);
				},
		});

		function adjustvalues(abc){
			discountamount11	=	abc;
			var qtyy=jQuery('#qty').html('×'+personcounter);
			jQuery('#Course_qty').val('×'+personcounter);
			if(personcounter == 1){
				jQuery('#first_name').attr('name', 'fname');
				jQuery('#last_name').attr('name', 'lname');
				jQuery('#email').attr('name', 'email');
				jQuery('#trCourse_total_Price').hide();
				jQuery('#Multiple_class_discount').hide();

			}
			var price11 = jQuery('#Price').html();
			price11 	= parseInt(price11.replace('£',''));
			var total11			=	personcounter * price11;
			
			
			LaunchDiscount77 		= 	jQuery('#database_Launch_Discount').val();
			
			if(LaunchDiscount77 != undefined){
				LaunchDiscount78 		=	(total11 * LaunchDiscount77)/100;			
				jQuery('#LaunchDiscount').html('-£'+LaunchDiscount78);
				jQuery('#Launch_DiscountT').val(LaunchDiscount78);
			}
			else{
				LaunchDiscount78	=	0;
			}		
			
			EarlyBirdDiscountt77	=	jQuery('#database_Early_Bird_Discount').val();

			if(EarlyBirdDiscountt77 != undefined){
				EarlyBirdDiscountt78 	=	(total11 * EarlyBirdDiscountt77)/100;			
				jQuery('#EarlyBirdDiscountt').html('-£'+EarlyBirdDiscountt78);
				jQuery('#EarlyBirdDiscount').val(EarlyBirdDiscountt78);
			}
			else{
				EarlyBirdDiscountt78	=	0;			
			}
			
					
			netdiscount		=	LaunchDiscount78 + EarlyBirdDiscountt78;	
			var totaldis77	=	parseInt(discountamount11) + netdiscount;		
			var dueamount11	=	(personcounter * price11) - totaldis77;

			
			jQuery('#total').html('£'+total11);
			
			jQuery('#Course_total_Price').val(total11);
			
			
			VAT			=	parseInt((dueamount11 * 1)/5);
			jQuery('#VAT').html('£'+VAT);
			jQuery('#hiddenVAT').val(VAT);
			
			// jQuery('#exclVAT').html('£'+dueamount11);
			jQuery('#exclVAT').html( curFormat(dueamount11) );

			jQuery('#excl_vat').val(dueamount11);
			
			dueamount11	=	dueamount11+VAT;
			
			jQuery('#balance-due').html( curFormat(dueamount11) );
			jQuery('#Course_balance_due').val(dueamount11);
		}
		
		jQuery(this).closest('.block').remove();
	
	}else{
		jQuery(this).closest('.block').find('p:last').text('Cannot delete attendees after applying discount');
		
		//.closest('p').find('.discountdisablestatus').text('Cannot delete attendees after applying discount')
		//alert('Cannot delete attendees after applying discount');
	}
});




//////////////////////////////////////////////////////////
//////////// FUNCTION TO APPLY DISCOUNT COUPON ///////////
//////////////////////////////////////////////////////////
					
jQuery('#Discountbutton').click(function(e){
	
	var dsc = jQuery("#AttendeeForm").valid();
	if(dsc){
	e.preventDefault();
	jQuery.ajax({
		type: "POST",
		url: "/wp-content/themes/Avada-Child-Theme/templates/discountprocessing.php",
		data: {
			Discountamount: jQuery("#DiscountCode").val(),
			Total33: jQuery("#total").html(),
			
		},
		success: function (resp) {
			
			//alert(resp);
			
			if(resp == "error"){
				//alert("Insert Valid Coupon");
				jQuery('#discountError').html('Invalid Discount Code');
				jQuery('#class_discount').hide();
				discountcal(0);
				discountdisablestatus 	=	false;
				jQuery('#discountdisablestatusadd').html('');
			}
			else{
				var dis 	=	'-£'+resp;
				jQuery('#discountError').html('Coupon Applied Successfully');
				jQuery('#discountErrore').hide();
				jQuery('#coupoun-discount').html(dis);
				jQuery('#Coupoun_Discount').val(dis);
				jQuery('#class_discount').show();

				//jQuery('#DiscountCode').prop('disabled', true);
				//jQuery('#Attendent').find('#Discountbutton').prop('disabled', true);
				discountdisablestatus 	=	true;
				discountcal(resp);

				
			}				
		},
	});	
}else{
	 return false;	
}
	 	
	 //jQuery('#Attendent').find('.delete_person_button').prop('disabled', true);
	 //jQuery('#Attendent').find('.add_person_button').prop('disabled', true);
	
	
});	



function discountcal(ddf){
	
	
		var disamount	=	ddf;
		
		var duebal		=	jQuery('#balance-due').html();
		var duebal1		=	duebal.split('£');
		var dueamt11	=	duebal1[1] - disamount;
		var dueamount11;
		
		var ftotal1				=	jQuery('#total').html();
		ftotal1 				= 	ftotal1.split('£');
		ftotal1					=	parseInt(ftotal1[1]);
		
		var multidisc11 		=	jQuery('#MultipleAttendeeDiscount').html();
		var multidisc12			=	multidisc11.split('£');
		var multidisc13			=	parseInt(multidisc12[1]);
		
		
		LaunchDiscount77 		= 	jQuery('#database_Launch_Discount').val();
				
		if(LaunchDiscount77 != undefined){
			LaunchDiscount77	=	jQuery('#LaunchDiscount').html();
			LaunchDiscount77	=	LaunchDiscount77.split('£');
			LaunchDiscount77	=	parseInt(LaunchDiscount77['1']);
		}
		else{
			LaunchDiscount77	=	0;
		}		
		
		EarlyBirdDiscountt77	=	jQuery('#database_Early_Bird_Discount').val();

		if(EarlyBirdDiscountt77 != undefined){
			EarlyBirdDiscountt77	=	jQuery('#EarlyBirdDiscountt').html();
			EarlyBirdDiscountt77	=	EarlyBirdDiscountt77.split('£');
			EarlyBirdDiscountt77	=	parseInt(EarlyBirdDiscountt77[1]);
		}
		else{
			EarlyBirdDiscountt77	=	0;			
		}
		
		netdiscount		=	parseInt(LaunchDiscount77) + parseInt(EarlyBirdDiscountt77) + parseInt(multidisc13) + parseInt(ddf);	
		
		vatamtexclusivevat	=	parseInt(ftotal1)-parseInt(netdiscount);
			
		jQuery('#exclVAT').html( curFormat(vatamtexclusivevat) );		 
		jQuery('#excl_vat').val(vatamtexclusivevat);
		 
		VAT			=	parseInt((vatamtexclusivevat*1)/5);
		dueamount11	=	parseInt(vatamtexclusivevat)+parseInt(VAT);
		 
		
		jQuery('#VAT').html( curFormat(VAT) );
		jQuery('#hiddenVAT').val(VAT);
		jQuery('#balance-due').html( curFormat(dueamount11) );
		jQuery('#Course_balance_due').val(dueamount11);
		
		
}


		// jQuery('#AttendeeForm').validate();
        // jQuery('input[type="text"]').each(function () {
        // jQuery(this).rules('add', {
            // required: true
        // });
		// });
		
});

jQuery('#pay_order_button').on('click', function(){
	jQuery("#AttendeeForm").valid();
});
	
</script>

<?php 
get_footer();
?>