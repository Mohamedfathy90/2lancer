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
        $user = App\Models\User::find(request()->get('user_id'));
		$orgEmail = $user->email ;
        $orgName = $user->username ;
        $orgTel = $user->phone ;
		$orgAmount =request()->get('amount');
        $orgClientId  =   "600004190";
  		$orgOid = request()->get('payment_id');
  		$orgOkUrl = "https://test2.mohamedfathy90.com/api/cmi/payment/success";
  		$orgFailUrl = "https://test2.mohamedfathy90.com/api/cmi/payment/failed";
  		$shopurl = "https://2lancer.ma";
  		$orgTransactionType = "PreAuth";
  		$orgRnd =  microtime();
  		$orgCallbackUrl = "https://test2.mohamedfathy90.com/api/cmi/callback";
  		$orgCurrency = "504";
		
	?>
	<center>
		<form style="width:100%;margin-top:15%;" method="post" action="{{route('api.payment_request')}}">
            @csrf
			   
				<input style="height:5%;" type="submit" value="Proceed to Payment" />
				<input type="hidden" name="clientid" value="{{ $orgClientId }}"> 
				<input type="hidden" name="okUrl" value="{{ $orgOkUrl }}">
				<input type="hidden" name="failUrl" value="{{ $orgFailUrl }}">
				<input type="hidden" name="TranType" value="{{ $orgTransactionType }}">
				<input type="hidden" name="callbackUrl" value="{{$orgCallbackUrl}}">
				<input type="hidden" name="shopurl" value="{{$shopurl}}">
				<input type="hidden" name="currency" value="{{$orgCurrency}}">
				<input type="hidden" name="rnd" value="{{$orgRnd}}">
				<input type="hidden" name="storetype" value="3D_PAY_HOSTING">
				<input type="hidden" name="hashAlgorithm" value="ver3">
				<input type="hidden" name="lang" value="en">
				<input type="hidden" name="amount" value="{{$orgAmount}}">
				<input type="hidden" name="refreshtime" value="5">
				<input type="hidden" name="BillToName" value="{{$orgName}}">
				<input type="hidden" name="BillToCompany" value="">
				<input type="hidden" name="email" value="{{$orgName}}">
				<input type="hidden" name="tel" value="{{$orgTel}}">
				<input type="hidden" name="encoding" value="UTF-8">
				<input type="hidden" name="AutoRedirect" value="true">
				<input type="hidden" name="oid" value="{{ $orgOid }}"> <!-- La valeur du paramètre oid doit être unique par transaction -->
				
		</form>

	</center>

</body>

</html>
