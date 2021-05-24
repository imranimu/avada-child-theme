<?php

	echo "<pre>";
	print_r($_POST);
	file_put_contents("");
	file_put_contents('mydata.txt',json_encode($_POST,true));

?>