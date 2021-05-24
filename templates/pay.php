<?php

	$url = "https://api.worldpay.com/v1/orders";
  
	$header =array( 
		"Content-Type: application/json",
		"Authorization:T_S_3d4b7cfe-8379-4663-b829-954ea24ed456"
	);
	 
	//============ Create Direct Order ============
	 $data = '{
				"paymentMethod": {
					"name": "cardholder-name",
					"expiryMonth": 2,
					"expiryYear": 2020,
					"issueNumber": 1,
					"startMonth": 2,
					"startYear": 2016,
					"cardNumber": "5555555555554444",
					"type": "Card",
					"cvc": "123"
				},
				"orderType": "ECOM",
				"amount": 500,
				"currencyCode": "GBP",
				"orderDescription": "Order description",
				"customerOrderCode":"my-customer-order-code",
				"settlementCurrency":"GBP",  
				"name": "name",
				"billingAddress": {
					"address1": "18 Linver Road",
					"postalCode": "SW6 3RB",
					"city": "London",
					"countryCode": "GB"
				},
				"deliveryAddress": {
					"firstName": "John",
					"lastName": "Smith",
					"address1": "address1",
					"address2": "address2",
					"address3": "address3",
					"postalCode": "postCode",
					"city": "Reading",
					"state": "Berkshire",
					"countryCode": "GB",
					"telephoneNumber": "02079460761"
				},
				"shopperEmailAddress": "name@domain.co.uk",
				"shopperIpAddress": "195.35.90.111",
				"shopperSessionId": "123"
			}'; 
	
	 $ch = curl_init();     
	 curl_setopt($ch, CURLOPT_URL, $url);  
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 //curl_setopt($ch, CURLOPT_HEADER, TRUE);
	 curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	 curl_setopt($ch, CURLOPT_POST, true);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 $result = curl_exec($ch);  
	 curl_close($ch); 
	 $res = json_decode($result, true);
	 
	 echo "<pre>";
	 print_r($res);
	 
?>