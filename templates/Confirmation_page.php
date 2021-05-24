<?php
/*
Template name:Confirmation_page_for_Worldpay 

*/
get_header();
	
$files = file_get_contents('Worldpay.txt', true);

$value = json_decode($files,true);
//echo "<pre>";
//print_r($value);

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
$pCourse_Date							=	$value['pCourse_Date'];
$pCourse_Location						=	$value['pCourse_Location'];
$pCourse_qty							=	$value['Course_qty'];
$Launch_Discount						=	$value['Launch_Discount'];
$EarlyBirdDiscount						=	$value['EarlyBirdDiscount'];
$Coupoun_MultipleAttendeeDiscount		=	$value['Coupoun_MultipleAttendeeDiscount'];
$Coupoun_Discount						=	$value['Coupoun_Discount'];
$Course_balance_due						=	$value['Course_balance_due'];
$hiddenVAT								=	$value['hiddenVAT'];
$fnames 								= 	$value['fname11'];		
$due_balance							=	$value['amount'];
$course_name							=	$value['Course_Name'];
$courseid								=	$value['Course_ID'];
//$date1									=	date('m-d-Y');
$excl_vat								=	$_POST['hiddenVAT'];

$VAT_Amount								=	explode("£",$hiddenVAT);
$VAT_Amount1							=	$VAT_Amount[1];

if($VAT_Amount1<1){
		$VAT_Amount1 = 0;
	}



$Res_file = file_get_contents('WorldpayResponse.txt', true);

$Response = json_decode($Res_file,true);

//echo "<pre>";
//print_r($Response);

$Order_date					=	date("d F Y H:i:s");
$Payment_Method				=	 'WorldPay'; 




?>

<div class="fusion-row" style="">
	<div id="content" style="width:100%">
		<div id="post-12877" class="post-12877 page type-page status-publish hentry">
			<span class="entry-title" style="display: none;">Certified-Agile-Mindset-Professional-Course-Booking-Confirmation</span><span class="vcard" style="display: none;"><span class="fn"><a href="https://sprint0.com/author/sprintadmin0786/" title="Posts by Ahmed Syed" rel="author">Ahmed Syed</a></span></span>
			<span class="updated" style="display:none;">2017-05-02T07:59:55+00:00</span><div class="post-content">
			<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
				<div class="fusion-column-wrapper">
					<div class="fusion-title title fusion-title-size-one">
						<h1 class="title-heading-left" data-fontsize="34" data-lineheight="48">Congratulations on booking your <?php echo $course_name;?> </h1><div class="title-sep-container">
						<div class="title-sep sep-double"></div>
						</div>
					</div>
					<p>Thank you for booking the <?php echo $course_name;?> course. Please find your booking details below. An email confirmation of your booking has been sent to you. Please check and keep this safe. Additionally, information on the exact location, together with directions will be sent to you in advance of the course.<div class="fusion-clearfix"></div>
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
				<p style="padding-left: 30px;"><span style="color: #000000;"><?php echo $course_name;?>,<?php echo $pCourse_Date;?>, <?php echo $pCourse_Location;?>.</span></p>
				
				
				<p><span style="color: #008000;"><strong>&nbsp;</strong>Attendee Information :&nbsp;</span></p>
				
				
				
				<?php 
				
				$fnames = $value['fname11'];
				if(isset($fnames)){
					
					if($fnames !=""){

						$counter = count($fnames);
						$attendee =1;


						for($u=0;$u<$counter;$u++){					

						$First_Name			=	$value['fname11'][$u];
						$Last_Name			=	$value['lname11'][$u];
						$Email_Address		=	$value['email11'][$u];	


						//	'.$First_Name.'&nbsp;'.$Last_Name.', ' .$Email_Address.'


						?>

						<ul>
						<p style="padding-left: 30px;"><span style="color: #000000;"><li><?php echo $First_Name. $Last_Name;?></li></span><br>
						<span style="color: #000000;"> <li><?php echo $Email_Address;?></li></span></p>
						</ul>


						<?php
						}
						
					}
				}else{
				?>	
					
					<ul>
						<p style="padding-left: 30px;"><span style="color: #000000;"><li><?php echo $payee_first_name. $payee_last_name;?></li></span><br>
						<span style="color: #000000;"> <li><?php echo $payment_email;?></li></span></p>
					</ul>
				<?	
				}
				?>
				<p><span style="color: #008000;">&nbsp;Payee Information :&nbsp;</span></p>
				<p style="padding-left: 30px;"><span style="color: #000000;">Order Date/Time : <?php echo $Order_date;?></span><br>
				<span style="color: #000000;"> Order ID : </span><br>
				<span style="color: #000000;"> Name : <?php echo $payee_first_name. $payee_last_name;?></span><br>
				<span style="color: #000000;"> Email Address : <?php echo $payment_email;?></span><br>
				<span style="color: #000000;"> Amount &nbsp;: <?php echo $Course_balance_due;?></span><br>
				<span style="color: #000000;"> Payee Authorisation Code : <?php echo $Response['orderCode'];?><br>
				Payment Method : <?php echo $Payment_Method.'';?> Credit Card<br>
				</span></p>
				<p style="padding-left: 30px;">
				</p>
				
				<div class="fusion-clearfix"></div>
				</div>
			</div>
			<div class="fusion-one-half fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-video fusion-youtube" style="max-width:600px;max-height:350px;"><div class="video-shortcode"><iframe title="YouTube video player" src="https://www.youtube.com/embed/?wmode=transparent&amp;autoplay=0" width="600" height="350" frameborder="0" allowfullscreen=""></iframe></div></div><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-one-fifth fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div><div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:20px;padding-left:0px;padding-right:0px;"><style type="text/css" scoped="scoped">.fusion-fullwidth-1 {
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
get_footer();
?>