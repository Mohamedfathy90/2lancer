<html>

<head>

<title>3D PAY HOSTING</title>

<meta http-equiv="Content-Language" content="tr">


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">


<meta http-equiv="Pragma" content="no-cache">


<meta http-equiv="Expires" content="now">


</head>


<body>

	<?php
	
		$orgClientId  =   "600004190";
  		$orgAmount = "100";
  		$orgOkUrl = "https://test2.mohamedfathy90.com/api/cmi/success";
  		$orgFailUrl = "https://test2.mohamedfathy90.com/api/cmi/failed";
  		$shopurl = "https://2lancer.ma";
  		$orgTransactionType = "PreAuth";
  		$orgRnd =  microtime();
  		$orgCallbackUrl = "http://www.nom_de_domaine.com/callback.php";
  		$orgCurrency = "504";
		
	?>
	<center>
		<form method="post" action="<?php echo e(route('api.payment_request'), false); ?>">
            <?php echo csrf_field(); ?>
			<table>
				<tr>
					<td align="center" colspan="2">
						<input type="submit" value="Complete Payment" /></td>
				</tr>

			</table>

				<input type="hidden" name="clientid" value="<?php echo $orgClientId ?>"> 
				<input type="hidden" name="amount" value="<?php echo $orgAmount ?>">
				<input type="hidden" name="okUrl" value="<?php echo $orgOkUrl ?>">
				<input type="hidden" name="failUrl" value="<?php echo $orgFailUrl ?>">
				<input type="hidden" name="TranType" value="<?php echo $orgTransactionType ?>">
				<input type="hidden" name="callbackUrl" value="<?php echo $orgCallbackUrl ?>">
				<input type="hidden" name="shopurl" value="<?php echo $shopurl ?>">
				<input type="hidden" name="currency" value="<?php echo $orgCurrency ?>">
				<input type="hidden" name="rnd" value="<?php echo $orgRnd ?>">
				<input type="hidden" name="storetype" value="3D_PAY_HOSTING">
				<input type="hidden" name="hashAlgorithm" value="ver3">
				<input type="hidden" name="lang" value="en">
				<input type="hidden" name="refreshtime" value="5">
				<input type="hidden" name="BillToName" value="name">
				<input type="hidden" name="BillToCompany" value="billToCompany">
				<input type="hidden" name="BillToStreet1" value="100 rue adress">
				<input type="hidden" name="BillToCity" value="casablanca">
				<input type="hidden" name="BillToStateProv" value="Maarif Casablanca">
				<input type="hidden" name="BillToPostalCode" value="20230">
				<input type="hidden" name="BillToCountry" value="504">
				<input type="hidden" name="email" value="email@domaine.com">
				<input type="hidden" name="tel" value="0021201020304">
				<input type="hidden" name="encoding" value="UTF-8">
				<input type="hidden" name="oid" value="123ABC"> <!-- La valeur du paramètre oid doit être unique par transaction -->
				
		</form>

	</center>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\2lancer\resources\views/api/cmi_redirect.blade.php ENDPATH**/ ?>