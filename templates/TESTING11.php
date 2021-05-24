<?php
	$due_balance			=	'-£700';
	$due_balance			=	explode("£",$due_balance);
	$due_balance1			=	$due_balance[1];
		
	print_r($due_balance1);
?>


<script>
	var abc 	=	'-£700';
	var pp		=	abc.split('£');
	
	alert(pp[1]);


</script>