<form action="" method="POST" id="myForm">
	<div class="col-md-12 col-lg-12">
	<div class="col-md-12 col-lg-12">
		<h3 class="heading">Who's Attending?</h3>
	</div>
	<div class="col-md-3 col-lg-3">
		<label for="first_name">First Name<span class="">*</span></label><br>
		<input id="first_name" value="" class="field" name="fname" type="text" placeholder="First Name" required=""><br>
		<p id="FNameerror"></p>
	</div>
	<div class="col-md-3 col-lg-3">
		<label for="last_name">Last Name<span class="">*</span></label><br>
		<input id="last_name" value="" class="field" name="lname" type="text" placeholder="Last Name" required="">
		<p id="LNameerror"></p>
	</div>
	<div class="col-md-6 col-lg-6">
		<label for="email">Email<span class="">*</span></label><br>
		<input id="email" value="" class="field" type="email" name="email" placeholder="me@example.com" required="">
		<p id="Emailerror"></p>
	</div>
	<input name="pay_order_button" id="pay_order_button" class="button submitable" type="submit" value="Proceed to Payment">
	</div>
</form>
<p id="demo"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$('#myForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'/wp-content/themes/Avada/templates/test1.php',
        type:'post',
        data:$('#myForm').serialize(),
        success:function(response){
			
			$('#demo').html(response);
			//window.location.href="https://sprint0.com/attendingpage/?Course_ID=1&data="+response;
            
        }
    });
});
</script>