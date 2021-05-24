<?php
/*
Template name:Thankyou
*/
get_header();
session_start();
//var_dump($_POST);
//print_r($_SESSION);

?>
	<div style="clear:both;"></div>	
		<div class="col-md-12 col-lg-12" style="margin-top:20px;">	</div>
	<div style="clear:both;"></div>
	
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
<?php 


$method 			= $_GET['method'];
$Payment_Status 	= $_GET['Payment_Status'];
$PPayment_Status 	= $_GET['Payment_Status'];
//$Course_name = $_GET['item_name'];
$Paypal_amount 		= $_GET['amount'];
$PaymentStatusReason= $_GET['PaymentStatusReason'];
$course_id 			= $_GET['cid'];

// $actualStatus  	= $_SESSION['paymentStatus'];
// $actualReason	= $_SESSION['paymentStatusReason'];

if($Payment_Status == 'FAILED' && $method == 'worldpay'){
	
?>



	<div class="col-md-8 col-md-offset-2">	
			<div style="clear:both;"></div>		
			<center>
				
				<p style="font-size:22px; line-height: 1.4;"> Sorry, we were unable to process your payment.</p>				
				<?php if( !empty($_SESSION['wordlpay']['paymentStatusReason']) ) { echo '<p style="font-size:22px; line-height: 2;">Your payment failed because:<br> <span class="error">'. $_SESSION['wordlpay']['paymentStatusReason'] . '.</span></p>'; } ?>

				

				<p style="font-size:22px; line-height: 1.4;">If you are having challenges paying online, then please contact us on : 07405 998194 or email us on <a href="mailto:support@sprint0.com">support@sprint0.com</a></p>

				<h3 class="success"><a href="/register-course-attendees/?Course_ID=<?php echo $course_id ?>">To try again, click here.</a></h3><br>
				
				


			</center>
	</div>

	
	<div style="clear:both;"></div>	
		<div class="col-md-12 col-lg-12" style="margin-top:20px;">	</div>

<?php 

	} elseif($Payment_Status == 'FAILED' && $method == 'paypal'){ ?>

	<div class="col-md-8 col-md-offset-2">	
			<div style="clear:both;"></div>		
			<center>


				
				<p style="font-size:22px; line-height: 1.4;">Sorry, we were unable to process your payment. 

				<?php if( $_GET['PaymentStatusReason'] == 'PAYMENT_CANCELLED' ) { echo 'You have cancelled the payment.'; } ?>
					</p>

				<p style="font-size:22px; line-height: 1.4;">If you are having challenges paying online, then please contact us on : 07405 998194 or email us on <a href="mailto:support@sprint0.com">support@sprint0.com</a></p>

				<h3 class="success"><a href="/register-course-attendees/?Course_ID=<?php echo $course_id ?>">To try again, click here.</a></h3><br>
				
			</center>
	</div>

	
	<div style="clear:both;"></div>	
		<div class="col-md-12 col-lg-12" style="margin-top:20px;">	</div>

<?php	}

?>

	<div style="clear:both;"></div>
<style>
.success{
    color: #4CAF50 !important;
    font-weight: 400;
    font-size: 1.25rem;
    line-height: 35px;
}
.failed{
    color: red !important;
    font-weight: 400;
    font-size: 1.25rem;
    line-height: 35px;
}
.error {
	color: #ff0000cc;
    background: #ffc0cb7a;
    padding: 3px 5px;
}
</style>


<?php
$payee_id = $_GET['pid'];
$home_dir = '/home/customer/www/sprint0.com/public_html';
if (file_exists( $home_dir . '/Worldpay-'.$payee_id.'.txt')){ unlink( $home_dir . '/Worldpay-'.$payee_id.'.txt'); }
if (file_exists( $home_dir . '/WorldpayResponse-'.$payee_id.'.txt')){ unlink( $home_dir . '/WorldpayResponse-'.$payee_id.'.txt'); }
if (file_exists( $home_dir . '/paypal/post-data-'.$payee_id.'.txt')){ unlink( $home_dir . '/paypal/post-data-'.$payee_id.'.txt'); }
if (file_exists( $home_dir . '/paypal/paypal-response-'.$payee_id.'.txt')){ unlink( $home_dir . '/paypal/WorldpayResponse-'.$payee_id.'.txt'); }

// destroy the session 
session_destroy(); 

get_footer();
?>
