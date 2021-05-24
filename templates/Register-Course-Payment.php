<?php 
/*
Template name: AttendingPage
*/

/* dev note 

	>1. enable McFee validation
	>2. change form action address
	?3. change pay submit url
*/
setlocale(LC_MONETARY, 'en_GB.UTF-8');

function worldpay_enqueue_script() {
    wp_enqueue_script( 'worldpay-script', 'https://cdn.worldpay.com/v1/worldpay.js' );
}
add_action( 'wp_enqueue_scripts', 'worldpay_enqueue_script' );

require_once('/home/customer/www/staging1.sprint0.com/db-config/config-sprint.php');


get_header();



//print_r($_POST);


function str2Num($string){

    return (int)filter_var($string, FILTER_SANITIZE_NUMBER_INT);

}


			
				$launch_dpre			=	$_POST['Launch_DiscountT'];
				$launch_disex			=	explode("£",$launch_dpre);
				$launch_discount		=	$launch_disex[1];
				
				$EarlyBird_dpre			=	$_POST['EarlyBirdDiscount'];
				$EarlyBird_disex		=	explode("£",$EarlyBird_dpre);
				$EarlyBird_Discount		=	$EarlyBird_disex[1];
				
				$MultipleAttendeeDiscount_dpre		=	$_POST['Coupoun_MultipleAttendeeDiscount'];
				$MultipleAttendeeDiscount_disex		=	explode("£",$MultipleAttendeeDiscount_dpre);
				$MultipleAttendee_Discount			=	$MultipleAttendeeDiscount_disex[1];
				
				$Coupoun_Discount_dpre				=	$_POST['Coupoun_Discount'];
				$Coupoun_Discount_disex				=	explode("£",$Coupoun_Discount_dpre);
				$Coupoun_Discount_Discount			=	$Coupoun_Discount_disex[1];
				
				$Course_qty_dpre				=	$_POST['Course_qty'];
				$Course_qty_disex				=	explode("×",$Course_qty_dpre);
				$Course_qty_D			=	$Course_qty_disex[1];
				
				
				$due_balance			=	$_POST['Course_balance_due'];
				//$due_balance1			=	explode("£",$due_balance);
				$due_balance2			=	str2Num($due_balance);
				
				
				$excl_vat				=	$_POST['excl_vat'];


				//$excl_vat1				=	explode("£",$excl_vat);
				$excl_vatt2				=	str2Num($excl_vat);	

				
				$hiddenVAT				=	$_POST['hiddenVAT'];
				//$hiddenVAT1				=	explode("£",$hiddenVAT);
				$hiddenVAT2				=	str2Num($hiddenVAT);


				if($due_balance2<1){
				$due_balance2 = 1;
				}
				$description			=	$_POST['Course_Name'];
				$Course_qty				=	$_POST['Course_qty'];
				

				$countries = array(

					"GB" => "United Kingdom",
					"US" => "USA",
					"CA" => "Canada",
					"FR" => "France",
					"DE" => "Germany",
					"AF" => "Afghanistan",
					"AX" => "Åland Islands",
					"AL" => "Albania",
					"DZ" => "Algeria",
					"AS" => "American Samoa",
					"AD" => "Andorra",
					"AO" => "Angola",
					"AI" => "Anguilla",
					"AQ" => "Antarctica",
					"AG" => "Antigua and Barbuda",
					"AR" => "Argentina",
					"AM" => "Armenia",
					"AW" => "Aruba",
					"AU" => "Australia",
					"AT" => "Austria",
					"AZ" => "Azerbaijan",
					"BS" => "Bahamas (the)",
					"BH" => "Bahrain",
					"BD" => "Bangladesh",
					"BB" => "Barbados",
					"BY" => "Belarus",
					"BE" => "Belgium",
					"BZ" => "Belize",
					"BJ" => "Benin",
					"BM" => "Bermuda",
					"BT" => "Bhutan",
					"BO" => "Bolivia",
					"BQ" => "Bonaire, Sint Eustatius and Saba",
					"BA" => "Bosnia and Herzegovina",
					"BW" => "Botswana",
					"BV" => "Bouvet Island",
					"BR" => "Brazil",
					"IO" => "British Indian Ocean Territory",
					"BN" => "Brunei Darussalam",
					"BG" => "Bulgaria",
					"BF" => "Burkina Faso",
					"BI" => "Burundi",
					"CV" => "Cabo Verde",
					"KH" => "Cambodia",
					"CM" => "Cameroon",
					"KY" => "Cayman Islands",
					"CF" => "Central African Republic",
					"TD" => "Chad",
					"CL" => "Chile",
					"CN" => "China",
					"CX" => "Christmas Island",
					"CC" => "Cocos (Keeling) Islands",
					"CO" => "Colombia",
					"KM" => "Comoros",
					"CD" => "Congo (Democratic Republic)",
					"CG" => "Congo",
					"CK" => "Cook Islands",
					"CR" => "Costa Rica",
					"CI" => "Côte d'Ivoire",
					"HR" => "Croatia",
					"CU" => "Cuba",
					"CW" => "Curaçao",
					"CY" => "Cyprus",
					"CZ" => "Czechia",
					"DK" => "Denmark",
					"DJ" => "Djibouti",
					"DM" => "Dominica",
					"DO" => "Dominican Republic",
					"EC" => "Ecuador",
					"EG" => "Egypt",
					"SV" => "El Salvador",
					"GQ" => "Equatorial Guinea",
					"ER" => "Eritrea",
					"EE" => "Estonia",
					"ET" => "Ethiopia",
					"FK" => "Falkland Islands",
					"FO" => "Faroe Islands",
					"FJ" => "Fiji",
					"FI" => "Finland",
					"GF" => "French Guiana",
					"PF" => "French Polynesia",
					"TF" => "French Southern Territories",
					"GA" => "Gabon",
					"GM" => "Gambia",
					"GE" => "Georgia",
					"GH" => "Ghana",
					"GI" => "Gibraltar",
					"GR" => "Greece",
					"GL" => "Greenland",
					"GD" => "Grenada",
					"GP" => "Guadeloupe",
					"GU" => "Guam",
					"GT" => "Guatemala",
					"GG" => "Guernsey",
					"GN" => "Guinea",
					"GW" => "Guinea-Bissau",
					"GY" => "Guyana",
					"HT" => "Haiti",
					"HM" => "Heard Island and McDonald Islands",
					"VA" => "Holy See",
					"HN" => "Honduras",
					"HK" => "Hong Kong",
					"HU" => "Hungary",
					"IS" => "Iceland",
					"IN" => "India",
					"ID" => "Indonesia",
					"IR" => "Iran",
					"IQ" => "Iraq",
					"IE" => "Ireland",
					"IM" => "Isle of Man",
					"IL" => "Israel",
					"IT" => "Italy",
					"JM" => "Jamaica",
					"JP" => "Japan",
					"JE" => "Jersey",
					"JO" => "Jordan",
					"KZ" => "Kazakhstan",
					"KE" => "Kenya",
					"KI" => "Kiribati",
					"KP" => "North Korea",
					"KR" => "South Korea",
					"KW" => "Kuwait",
					"KG" => "Kyrgyzstan",
					"LA" => "Lao",
					"LV" => "Latvia",
					"LB" => "Lebanon",
					"LS" => "Lesotho",
					"LR" => "Liberia",
					"LY" => "Libya",
					"LI" => "Liechtenstein",
					"LT" => "Lithuania",
					"LU" => "Luxembourg",
					"MO" => "Macao",
					"MK" => "Macedonia",
					"MG" => "Madagascar",
					"MW" => "Malawi",
					"MY" => "Malaysia",
					"MV" => "Maldives",
					"ML" => "Mali",
					"MT" => "Malta",
					"MH" => "Marshall Islands",
					"MQ" => "Martinique",
					"MR" => "Mauritania",
					"MU" => "Mauritius",
					"YT" => "Mayotte",
					"MX" => "Mexico",
					"FM" => "Micronesia",
					"MD" => "Moldova",
					"MC" => "Monaco",
					"MN" => "Mongolia",
					"ME" => "Montenegro",
					"MS" => "Montserrat",
					"MA" => "Morocco",
					"MZ" => "Mozambique",
					"MM" => "Myanmar",
					"NA" => "Namibia",
					"NR" => "Nauru",
					"NP" => "Nepal",
					"NL" => "Netherlands",
					"NC" => "New Caledonia",
					"NZ" => "New Zealand",
					"NI" => "Nicaragua",
					"NE" => "Niger",
					"NG" => "Nigeria",
					"NU" => "Niue",
					"NF" => "Norfolk Island",
					"MP" => "Northern Mariana Islands",
					"NO" => "Norway",
					"OM" => "Oman",
					"PK" => "Pakistan",
					"PW" => "Palau",
					"PS" => "Palestine",
					"PA" => "Panama",
					"PG" => "Papua New Guinea",
					"PY" => "Paraguay",
					"PE" => "Peru",
					"PH" => "Philippines",
					"PN" => "Pitcairn",
					"PL" => "Poland",
					"PT" => "Portugal",
					"PR" => "Puerto Rico",
					"QA" => "Qatar",
					"RE" => "Réunion",
					"RO" => "Romania",
					"RU" => "Russian Federation",
					"RW" => "Rwanda",
					"BL" => "Saint Barthélemy",
					"SH" => "Saint Helena, Ascension and Tristan da Cunha",
					"KN" => "Saint Kitts and Nevis",
					"LC" => "Saint Lucia",
					"MF" => "Saint Martin",
					"PM" => "Saint Pierre and Miquelon",
					"VC" => "Saint Vincent and the Grenadines",
					"WS" => "Samoa",
					"SM" => "San Marino",
					"ST" => "Sao Tome and Principe",
					"SA" => "Saudi Arabia",
					"SN" => "Senegal",
					"RS" => "Serbia",
					"SC" => "Seychelles",
					"SL" => "Sierra Leone",
					"SG" => "Singapore",
					"SX" => "Sint Maarten",
					"SK" => "Slovakia",
					"SI" => "Slovenia",
					"SB" => "Solomon Islands",
					"SO" => "Somalia",
					"ZA" => "South Africa",
					"GS" => "South Georgia and the South Sandwich Islands",
					"SS" => "South Sudan",
					"ES" => "Spain",
					"LK" => "Sri Lanka",
					"SD" => "Sudan",
					"SR" => "Suriname",
					"SJ" => "Svalbard and Jan Mayen",
					"SZ" => "Swaziland",
					"SE" => "Sweden",
					"CH" => "Switzerland",
					"SY" => "Syria",
					"TW" => "Taiwan",
					"TJ" => "Tajikistan",
					"TZ" => "Tanzania",
					"TH" => "Thailand",
					"TL" => "Timor-Leste",
					"TG" => "Togo",
					"TK" => "Tokelau",
					"TO" => "Tonga",
					"TT" => "Trinidad and Tobago",
					"TN" => "Tunisia",
					"TR" => "Turkey",
					"TM" => "Turkmenistan",
					"TC" => "Turks and Caicos Islands",
					"TV" => "Tuvalu",
					"UG" => "Uganda",
					"UA" => "Ukraine",
					"AE" => "United Arab Emirates",
					"UM" => "United States Minor Outlying Islands (the)",
					"UY" => "Uruguay",
					"UZ" => "Uzbekistan",
					"VU" => "Vanuatu",
					"VE" => "Venezuela (Bolivarian Republic of)",
					"VN" => "Viet Nam",
					"VG" => "Virgin Islands (British)",
					"VI" => "Virgin Islands (U.S.)",
					"WF" => "Wallis and Futuna",
					"EH" => "Western Sahara*",
					"YE" => "Yemen",
					"ZM" => "Zambia",
					"ZW" => "Zimbabwe"
				);
					
			?>

<!-- ----Start Who's Paying page--- -->
<div id="PayingPage" class="col-md-12 col-lg-12">

	<div class="col-md-8 col-lg-8">
	
	
	<form name="Paymentform" id="Paymentform" action="//www.sprint0.com/pay1.php?Course_ID=<?php echo $_POST['Course_ID']; ?>" method="post" >
	
		
		<?php
			$i	=	0;
			if(isset($_POST) && ($_POST != '')){

				if(is_array($_POST['fname'])){
					foreach($_POST['fname'] as $key=>$val){
						$counter[$i]	=	$val;
	?>
						<input type="hidden" name="fname11[]" id="fname11" value="<?php echo stripslashes($counter[$i]);?>">
	<?php
						$i++;
					}
				}else{
					?>
							<input type="hidden" name="payment_first_name" id="payment_first_name" value="<?php echo stripslashes($_POST['fname']);?>">
				<?php		
				}
			}
	
			$i	=	0;				
			if(isset($_POST) && ($_POST != '')){
				if(!is_array($_POST['fname'])) {
		?>
					<input type="hidden" name="payment_last_name" id="payment_last_name" value="<?php echo stripslashes($_POST['lname']);?>">
		<?php		
				}else{
					if(is_array($_POST['lname'])){
						foreach($_POST['lname'] as $key=>$val){
							$counter[$i]	=	$val;
		?>
							<input type="hidden" name="lname11[]" id="lname11" value="<?php echo stripslashes($counter[$i]);?>">
		<?php
							$i++;
						}
					}
				}
			}
		?>

		<?php
				$i	=	0;				
				if(isset($_POST) && ($_POST != '')){
					if(!is_array($_POST['fname'])) {
		?>
						<input type="hidden" name="email" id="email" value="<?php echo $_POST['email'];?>">
		<?php			}
					else{
						if(is_array($_POST['lname'])){
							foreach($_POST['email'] as $key=>$val){
								$counter[$i]	=	$val;
			?>
								<input type="hidden" name="email11[]" id="email11" value="<?php echo $counter[$i];?>">
			<?php
								$i++;
							}
						}
					}
				}
		?>
		
		
		<h3 class="heading">Payee Details</h3>
		<div class="col-md-12 col-lg-12"></div>		
	
	<?php
					
			$totalpeopleenrolled 	= 	$_POST['Course_qty'];
			$totalpeopleenrolled1 	=	explode("×", $totalpeopleenrolled);
			$totalpeopleenrolled2	=	$totalpeopleenrolled1[1];			
		
			if($totalpeopleenrolled2 > 1){
	?>		
						
				<div class="col-md-2 col-lg-2">
					<label for="payment_first_name">First Name</label><br> 
				</div>
				<div class="col-md-10 col-lg-10">
					
					<input placeholder="First Name" type="text" Placeholder="First Name" value="" name="payment_first_name" id="payment_first_name" >
					<p id="fnameerror"></p>
				</div>

				<div style="clear:both;"></div>
				
				<div class="col-md-2 col-lg-2">
					<label for="payment_last_name">Last Name</label><br> 
				</div>
				<div class="col-md-10 col-lg-10">
					<input placeholder="Last Name" type="text" Placeholder="a" value="" name="payment_last_name" id="payment_last_name" >
					<p id="lnameerror"></p>
				</div>
				
				<div style="clear:both;"></div>
						
				<div class="col-md-2 col-lg-2">
					<label for="payment_email">Email</label><br>
				</div>
				<div class="col-md-10 col-lg-10">
					<input placeholder="Email" type="email" Placeholder="a@gmail.com" value="" name="email" id="email" >
					<p id="Emailerror"></p>
				</div>
				
				<div style="clear:both;"></div>
				
				
	<?php		
			}else{
	?>			
				<div class="col-md-2 col-lg-2">
					<label for="payment_first_name">First Name</label><br> 
				</div>
				<div class="col-md-10 col-lg-10">
					<input placeholder="First Name" type="text" Placeholder="First Name" value="<?php echo stripslashes($_POST['fname']);?>" name="payment_first_name" id="payment_first_name" >
					<p id="fnameerror"></p>
				</div>

				<div style="clear:both;"></div>
				
				<div class="col-md-2 col-lg-2">
					<label for="payment_last_name">Last Name</label><br> 
				</div>
				<div class="col-md-10 col-lg-10">
					<input placeholder="Last Name" type="text" Placeholder="a" value="<?php echo stripslashes($_POST['lname']);?>" name="payment_last_name" id="payment_last_name" >
					<p id="lnameerror"></p>
				</div>
				
				<div style="clear:both;"></div>
						
				<div class="col-md-2 col-lg-2">
					<label for="payment_email">Email</label><br>
				</div>
				<div class="col-md-10 col-lg-10">
					<input placeholder="Email" type="email" Placeholder="a@gmail.com" value="<?php echo $_POST['email'];?>" name="email" id="email" >
					<p id="Emailerror"></p>
				</div>
				
				<div style="clear:both;"></div>
	<?php
			}
		
		
	?>		

		
		<div class="col-md-2 col-lg-2">
			<label for="payment_company">Company Name</label><br>
		</div>
		<div class="col-md-10 col-lg-10">
			<input placeholder="Company" type="text"  Placeholder="Company Name" value="" name="payment_company" id="payment_company">
			<span class="instructions no-label optional">(optional)</span>
		</div>
		
		<div style="clear:both;"></div>
				
		<div class="col-md-2 col-lg-2">
			<label for="payment_phone">Phone Number</label><br>
		</div>
		<div class="col-md-10 col-lg-10">
			<input type="text" placeholder="Phone Number" name="payment_phone" value="" class ="numeric" id="payment_phone">
			<p id="phoneerror"></p>
		</div>
		
		<div style="clear:both;"></div>
		
		<!- -----Start Billing Address--------- ->
		
		<h3 class="heading">Billing Address</h3>
				
		<div class="col-md-2 col-lg-2">
			<label for="payment_street_address">Address</label><br>
		</div>
		<div class="col-md-10 col-lg-10">
			<input placeholder="Street Address" type="text" name="payment_address1" value="" id="payment_address1"required="">
			<p id="addresseerror" style="color:red;"></p>

			<div style="clear:both;"><br></div>
			
			<input placeholder="Extended Address" type="text" name="payment_address2" value="" id="payment_address2">
			<p id="addresseerror2" style="color:red;"></p>
			<span class="instructions no-label optional">(optional)</span>
		</div>
		
		<div style="clear:both;"><br></div>
		
		<div class="col-md-2 col-lg-2">
			<label for="payment_city"></label><br>
		</div>
		<div class="col-md-4 col-lg-4" style="margin-bottom:20px;">
			<input placeholder="City" type="text" name="payment_city" value="" id="payment_city" required="">
			<p id="cityerror"></p>
		</div>
		<div class="col-md-3 col-lg-3">
			<input placeholder="State" type="text" name="payment_state" value="" id="payment_state" required="">
			<p id="stateerror"></p>
		</div>
		<div class="col-md-3 col-lg-3">
			<input placeholder="Postal code" type="text"  name="bpostal_code" value="" id="bpostal_code" class ="numeric" required="">
			<p id="bpostal_codeerror"></p>
		</div>

		<div style="clear:both;"></div>
		
		<div class="col-md-2 col-lg-2">
			<label for="payment_country_code">Country</label><br>
		</div>
		<div class="col-md-10 col-lg-10">
			<select name="payment_country" id="payment_country" class="col-xs-12" required="">
				<option value="">Select Country</option>

				<?php foreach ($countries as $country_code => $country_name) { 

					echo '<option value="'. $country_code .'">'. $country_name . '</option>';
					
				}?>

			</select>
			<p id="countryerror"></p>
		</div>
		<!- -----End Billing Address-------- -->
		<!- --------Hidden Fields Data------------- -->

		<input type="hidden" name="Course_ID" value="<?php echo $_POST['Course_ID']; ?>">
		<input type="hidden" name="Course_Name" id="Course_Name"	value="<?php echo $_POST['Course_Name']; ?>">
		<input type="hidden" name="Course_qty" 	id="Course_qty" value="<?php echo $_POST['Course_qty']; ?>">
		<input type="hidden" name="pCourse_Date" value="<?php echo $_POST['Course_Date']; ?>">
		<input type="hidden" name="Course_Price" id="Course_Price" value="<?php echo $_POST['Course_Price']; ?>">
		<input type="hidden" name="pCourse_Location" value="<?php echo $_POST['Course_Location']; ?>">
		<input type="hidden" name="Course_total_Price" id="Course_total_Price" value="<?php echo $_POST['Course_total_Price']; ?>">
		<input type="hidden" name="EarlyBirdDiscount" id="EarlyBirdDiscount" value="<?php echo $EarlyBird_Discount; ?>">
		<input type="hidden" name="Launch_Discount" id="Launch_Discount" value="<?php echo $launch_discount;?>">
		<input type="hidden" name="Coupoun_Discount" id="Coupoun_Discount"  value="<?php echo $_POST['Coupoun_Discount']; ?>">
		<input type="hidden" name="Coupoun_MultipleAttendeeDiscount" id="Coupoun_Discount"  value="<?php echo $_POST['Coupoun_MultipleAttendeeDiscount']; ?>">
		<input type="hidden" name="Course_balance_due" id="Course_balance_due"  value="<?php echo $due_balance2;?>">	
		<input type="hidden" name="excl_vat"  id="excl_vat"  value="<?php echo $excl_vatt2;?>">			
		<input type="hidden" id="hiddenVAT" name="hiddenVAT"  value="<?php echo $hiddenVAT2;?>">



		<!- --------End Hidden fields Data------------- -->

		<div class="col-md-12"></div>
		
		<div style="clear:both;"><br></div>
		
		<div class="col-md-2 col-lg-2"></div>
		
		<div class="col-md-10 col-lg-10">
			<p><input type="checkbox" name="agree" id="agree" class="agree" style="vertical-align: bottom;float: left;">&nbsp; I have read and agree to the following <a href="<?php echo home_url();?>/bookingterms/" target="_blank" style="vertical-align: bottom;text-decoration: underline;">booking terms.</a></p>
		</div>
		
		
		<div style="clear:both;"><br></div>
		
		<!-- ----Start Payment Buttons div--------- -->
		
		
		<center >
			<div class="col-md-2 col-lg-2"></div>
			<div class="col-md-10 col-lg-10"  style="border:1px solid lightgrey; margin-bottom: 10px;">
			
			<div class="col-md-12 col-lg-12">
				<div class="col-md-9 col-lg-9" style="text-align: -webkit-left;">
				<h3 class="heading">Select Payment Option</h3>
				</div>
				<div class="col-md-3 col-lg-3">
				
				
				<p>

				<script src="https://cdn.ywxi.net/js/inline.js?w=90"></script>
			
				</p>

				</div>
			</div>
			
			
				<div class="col-md-12 col-lg-12" >
					<div style="clear:both;"></div>
					
						<div class="col-md-5 col-lg-5">
							<label class="credit_Card" for="credit_Card">
								<input id="credit_card_payment" name="Payment_radio" value="credit_card_payment" type="radio" checked=""><span class="field-name">&nbsp;<img src="/wp-content/uploads/2017/04/Payicon.png" alt="Credit Card Icons" style="height:24px;" width=""> </span>
							</label><br>
							<!-- div class="col-md-12 col-lg-12">
								
							</div -->
						</div>
						<div class="col-md-4 col-lg-4" style="">
							<label class="paypal" for="paypal">
								<input id="Paypal_payment" name="Payment_radio" value="Paypal_payment" class="" type="radio"><span class="field-name">&nbsp;<img src="/wp-content/uploads/2017/04/PP_logo.png" alt="Credit Card Icons" height="20" width="93"></span>
							</label><br>
							<!--div class="col-md-12 col-lg-12">
								
							</div-->
						</div>
						<div class="col-md-3 col-lg-3">
						</div>
						
					
					<div style="clear:both;"><br></div>
				
				</div>
				
				<div class="col-md-12 col-lg-12" id="credit_card">
					<div class="row1">
					<div id="new_paymentForm" class="col-md-12 col-lg-12" style="">	
						<center>
							<button style="display:block;" id="btnCardDetails" class="btn button" onclick="formVal()">Enter Card Details</button>
							<div style="display: none;" id="cardDetails">
								<div id='paymentSection'></div>
							</div>	
						</center>
					
					</div>
					
					<div style="clear:both;"><br><br></div>


					<div class="row1">
						<div class="col-md-offset-2 col-md-10 col-lg-10">
							<center>
								<input style="margin-left: -100px; display: none;" type="submit" name="Credit_submit" value="Purchase" id="purchase_btn" class="button submit" onclick="worldpayPay()">
								<!-- <input style="margin-left: -100px;" type="submit" name="Credit_submit" value="Purchase" id="purchase_btn" class="button submit"> -->

							</center>
						</div>
					</div>

					<div style="clear:both;"></div>
					
					
					<div class="col-md-offset-1 col-md-10 col-lg-10">
						<center>
							<p>Secure data transmitted using 256 bit SSL encryption only. &#128274;</p>
						</center>
					</div>
					<div class="col-md-1 col-lg-1"></div>

					<div style="clear:both;"></div>
					

				<!- --End Credit Card details---- -->
				</div>
				</div>


				<div id="paypal_button" style="display: none; pointer: cursor;">
					<!-- <button class="button" alt="PayPal Checkout" onClick="paypalPay()">Checkout with PayPal</button> -->
					<img style="cursor: pointer;" src="/wp-content/uploads/2017/04/checkout-logo-large.png" alt="PayPal Checkout" onClick="paypalPay()">
					<br><br>
				</div>
			</div>
		
		</center>
		
		
		<script>
		(function($){
			$(document).ready(function() {
							
				$('input[type="radio"]').click(function() {
					if($(this).attr('id') == 'credit_card_payment') {
					$('#credit_card').show();
					$('#paypal_button').hide();
					//alert('credit_card_payment');
					}

					if($(this).attr('id') == 'Paypal_payment') {
					$('#credit_card').hide();
					$('#paypal_button').show();
					//alert('Paypal_payment');
					}
				});
				
			});

		})(jQuery);
		</script>
		
		
		<!- ----End Payment Buttons div--------- -->				

		<div style="clear:both;"></div>		

		<!- --Start Credit Card details---- -->
		<div class="col-md-2 col-lg-2"></div>
		
		
				
		<div style="clear:both;"></div>
		
		
		
	</form>
		
	</div>
	
	<div class="col-md-4 col-lg-4"><br><br>
	
		<div class="col-md-12 col-lg-12">
			<div class="col-md-12 col-lg-12" style="border: 1px solid #d2d2d2;">
				<div id="payment_total" class="sidebar-section">
		
						<h3 class="text-center heading-hl" style="color:#f09e0e !important;">Summary</h3>

				
					<div id="totals" class="text-small">
						<div id="summary-table">
							<table class="col-md-12">
							<tr>
								<th style="width: 50%;"> 
							<!--input type="hidden" name="Course_Name" value="<?php //echo $Course1; ?>"-->
								<strong><?php echo $_POST['Course_Name']; ?></strong>
								</th>
								
							<!--input type="hidden" name="Course_qty" id="Course_qty" value=""-->
								<td class="qty" id="qty"><?php echo $_POST['Course_qty']; ?> <span>&nbsp;&nbsp;</span> </td>
								
							<!--input type="hidden" name="Course_Price" value="<?php //echo $Price; ?>"-->
								<td class="Price" id="Price"><?php echo $_POST['Course_Price']; ?></td>
							</tr>								
							<tr id="trCourse_total_Price" style="display:none;">
							
							<!--input type="hidden" name="Course_total_Price" value="<?php //echo $Price; ?>"-->
								<th colspan="2"><strong>Total Course Price</strong></th>
								<td id="total">£<?php echo $_POST['Course_total_Price']; ?></td>
							</tr>
							
							<tr class="tEarlyBirdDiscount" id="tEarlyBirdDiscount" style="display:none;">										
								<th colspan="2">Early Bird Discount</th>
							<!--input type="hidden" name="EarlyBirdDiscount" id="EarlyBirdDiscount" value="<?php //echo '£'.$Price; ?>"-->
								<td id="EarlyBirdDiscountt"><?php echo $_POST['EarlyBirdDiscount']?></td>
							</tr>


							<tr class="tLaunchDiscount" id="tLaunchDiscount" style="display:none;">											
								<th colspan="2">Launch Discount</th>
							<!--input type="hidden" name="Launch_Discount" id="Launch_Discount" value="<?php //echo '£'.$status_dis; ?>"-->
								<td id="LaunchDiscount"><?php echo $_POST['Launch_DiscountT']?></td>
							</tr>

							<tr class="class_discount" id="class_discountclass_discount" style="display:none;">								
							<!--input type="hidden" id="Coupoun_Discount" name="Coupoun_Discount" value=""-->
								<th colspan="2">Coupon Discount</th>
								<td id="coupoun-discount"><?php echo $_POST['Coupoun_Discount']; ?></td>
							</tr>
							<tr class="Multiple_class_discount" id="Multiple_class_discount" style="display:none;">								
						<!--input type="hidden" id="Coupoun_Discount" name="Coupoun_MultipleAttendeeDiscount"  value=""-->
								<th colspan="2">Multiple Attendee Discount</th>
								<td id="MultipleAttendeeDiscount">£<?php echo $_POST['Coupoun_MultipleAttendeeDiscount']; ?></td>
							</tr>
							<tr class="Total_VAT" id="Total_VAT">
								<input type="hidden" id="excl_vat" name="excl_vat"  value="<?php echo $excl_vatt2;?>">
								<th colspan="2">Total (excl VAT)</th>
								<!-- <td id="exclVAT">£<?php echo $_POST['excl_vat'];?></td> -->
								<td id="exclVAT"><?php echo money_format('%.0n', $_POST['excl_vat'] );?></td>
							</tr>
							<tr class="class_VAT" id="class_VAT">
								<input type="hidden" id="hiddenVAT" name="hiddenVAT"  value="<?php echo $hiddenVAT2;?>">
								<th colspan="2">VAT (20%)</th>
								<td id="VAT"><?php echo money_format('%.0n', $_POST['hiddenVAT'] );?></td>
							</tr>

							<tr class="po-unpaid">
							
							<input type="hidden" name="Course_balance_due" id="Course_balance_due"  value="<?php echo $_POST['Course_balance_due']; ?>">
								<th colspan="2"><strong>Balance Due</strong></th>
								<td id="balance-due">
								<?php echo money_format('%.0n', $_POST['Course_balance_due'] ); ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div style="clear:both;"><br></div>	
		<div class="col-md-12 col-lg-12">
			<div class="mfes-w297">
			<p class="has-leader text-small cc" style="float:right;">
				<script src="https://cdn.ywxi.net/js/inline.js?t=103"></script>
			</p>
			</div>
		</div>
	</div>
	</form>
	
	<div style="clear:both;"></div>
	

	<div class="col-md-8 col-lg-8" style="display: none;">
			<!- ---Paypal Button Div----- -->
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-md-10 col-lg-10" style="border: 1px solid lightgrey;border-top: none;">
			<div style="clear:both;"></div>
			<center>
				<div id="paypal_button" style="display:none;">
				
				</div>
					<p id="demo" style="display:none;"></p>				
			</center>
		
			<div style="clear:both;"><br></div>
		
		</div>
		
		<div style="clear:both;"><br></div>
		
		
		<!- ---End Paypal Button Div----- -->
	</div>

</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>

<script>
(function($){

jQuery(document).ready(function(){
	
		var coupou_discount= jQuery('#coupoun-discount').html();
		var MultipleAttendeeDiscount=jQuery('#MultipleAttendeeDiscount').html();
		var EarlyBirdDiscountt=jQuery('#EarlyBirdDiscountt').html();	
		var LaunchDiscount=jQuery('#LaunchDiscount').html();
		
		if(coupou_discount){
				jQuery('#class_discountclass_discount').show();
		}		
		 if(MultipleAttendeeDiscount != '' && MultipleAttendeeDiscount != '£0'){
			jQuery('#Multiple_class_discount').show();
			jQuery('#trCourse_total_Price').show();
		}
		if(MultipleAttendeeDiscount == '-£0'){
			jQuery('#Multiple_class_discount').hide();
			jQuery('#trCourse_total_Price').hide();
		}
		if(EarlyBirdDiscountt != ''){
			jQuery('#tEarlyBirdDiscount').show();
		}
		if(LaunchDiscount != ''){
			jQuery('#tLaunchDiscount').show();
		 }

		jQuery("#Paymentform").validate({
		
			// Specify the validation rules
			rules: {
			//	payment_first_name: "required",
				payment_first_name: {
					required: true,
					letterswithbasicpunc: true
				},
				payment_last_name: {
					required: true,
					letterswithbasicpunc: true
				},
				email: {
					required: true,
					email: true
				},
				//payment_phone: "required",
				//payment_address1: "required",
				//payment_city: "required",
				payment_phone: {
					required: true,
					phonesUK: true
					//digits: true
				},
				payment_city: {
					required: true,
					letterswithbasicpunc: true
				},
				payment_state: {
					required: true,
					letterswithbasicpunc: true
				},
				// payment_address1: {
					// alphanumeric: true
				// },
				expiration_year: {
					required: true,
					minlength: 4,
					digits: true
				},
				expiration_month: {
					required: true,
					digits: true
				},
				credit_card_number: {
					required: true,
					digits: true
				},
				cvv: {
					required: true,
					digits: true
				},
				postal_code: {
					required: true
				},
				bpostal_code: {
					required: true
				},
				agree:{
					required: true
					
				}
				//payment_state: "required"
			},
			// Specify the validation error messages
			messages: {
				payment_first_name: {
					required: "This field is required.",
					letterswithbasicpunc: "Please enter a valid name"
				},
				payment_last_name: {
					required: "This field is required.",
					letterswithbasicpunc: "Please enter a valid name"
				},						
				//bpostal_code: {
				//	required: "Please provide a bpostal_code",
				//	minlength: "Your bpostal_code must be at least 5 characters long"
				//},
				email: "Please enter a valid email address",
				payment_phone: {
					required: "This field is required",
					phonesUK: "Please provide a valid UK phone number"
				},
				payment_city: {
					required: "This field is required",
					letterswithbasicpunc: "Please Provide a valid city"
				},
				payment_state: {
					required: "This field is required",
					letterswithbasicpunc: "Please Provide a valid state"
				},

				agree:"This field is required."
				//payment_address1: "Please enter your payment_address1",
				//payment_city: "Please enter your payment_city",
				//payment_state: "Please enter your payment_state",
			},
			// submitHandler: function(form) {
			// 	form.submit();
			// }

		});
				
		jQuery('input[type="radio"]').click(function() {
			if(jQuery(this).attr('id') == 'credit_card_payment') {
			jQuery('#credit_card').show();
			jQuery('#paypal_button').hide();
			//alert('credit_card_payment');
			}

			if(jQuery(this).attr('id') == 'Paypal_payment') {
			jQuery('#credit_card').hide();
			jQuery('#paypal_button').show();
			//alert('Paypal_payment');
			}
		});
		
		if(jQuery('#Paypal_payment').prop('checked') == true){
			jQuery('#credit_card').hide();
			jQuery('#paypal_button').show();	
		}			
		if(jQuery('#credit_card_payment').prop('checked') == true){
			jQuery('#credit_card').show();
			jQuery('#paypal_button').hide();	
		}			
		
});

})(jQuery);

function paypalPay(){

	jQuery('#Paymentform').valid();

	jQuery('#Paymentform').attr('action', '/paypal/pay-paypal.php?Course_ID=<?php echo $_POST['Course_ID'];?>');
	jQuery('#Paymentform').removeAttr('onsubmit').submit();

}

function formVal(){

	if ( jQuery('#Paymentform').valid() ) {
		jQuery('#btnCardDetails').hide();
		jQuery('#cardDetails').show();
		jQuery('#purchase_btn').show();

	}
}

function worldpayPay(){
	var btn = jQuery('#purchase_btn');

	btn.prop('disabled', true).val('Validating...');
	
	Worldpay.submitTemplateForm();
	
	setTimeout(function(){
        btn.prop('disabled', false).val('Purchase');
    }, 3*1000);
    
}

</script>
<!-- script to insert the value onkeyevnet  -->

<!-- End script to insert the value onkeyevnet  -->

<!-- <script src="https://cdn.worldpay.com/v1/worldpay.js"></script>         -->

<!-- live 'clientKey':'L_C_50997911-4fdd-45b9-b02a-a503740d6299', -->

<!-- test 'clientKey' : 'T_C_2221488e-1b73-45b1-892a-cd75475180e9', -->
<?php 
	$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	$option_data = mysqli_query($con, "SELECT `option_value` FROM `h8z_options` WHERE `option_name` = 'worldpay-live-mode'");
	$option_row  =   mysqli_fetch_row($option_data); 
	$live_mode   =   $option_row[0]; 
	 mysqli_close($con);
?>

<script type='text/javascript'>
    window.onload = function() {
	
      Worldpay.useTemplateForm({

        <?php //if($live_mode) : ?>
        <?php //else : ?>
        	//'clientKey' : 'T_C_2221488e-1b73-45b1-892a-cd75475180e9',
        	// 'clientKey' : 'L_C_50997911-4fdd-45b9-b02a-a503740d6299',
        <?php //endif; ?>
        
        'clientKey' : 'L_C_50997911-4fdd-45b9-b02a-a503740d6299',
        'form':'Paymentform',
		'saveButton':false,
        'paymentSection':'paymentSection',
        'display':'inline',
        'reusable':true,
        'callback': function(obj) {
          if (obj && obj.token) {
            var _el = document.createElement('input');
            _el.value = obj.token;
            _el.type = 'hidden';
            _el.name = 'token';
            document.getElementById('Paymentform').appendChild(_el);
            document.getElementById('Paymentform').submit();
          }
        }
      });
    }

</script>

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
    margin-right: 0%;
    width: 100%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
	outline: none;
}
select{
	border: 1px solid #d2d2d2;
    font-size: 13px;
    color: #747474 !important;
    padding: 8px 15px;
    margin-right: 0%;
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
	outline: none;
}
input[type="tel"]:focus{
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
	padding-left: 5px;
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
input#purchase_btn:disabled{
	background: #aaa;
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
.error{
	color:red;
	float: right;
}

select{
	height:auto;
	padding: 5px 15px;
}

@media (max-width:480px){
	#main{
		padding-left:0;
		padding-right:0;
	}


}

#_el_error_nameoncard label._error{
	color:red;
}

</style>

<?php 
get_footer();
?>