<?php
	require_once('GoogleAuthenticator.php');
	
    $ga = new PHPGangsta_GoogleAuthenticator();

	$secret = $ga->createSecret();
	echo "El secreto es: ".$secret;
	echo "<br>";

	$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
	echo "QR-Code: ".$qrCodeUrl;
	echo "<br>";
	echo "<img src='".$qrCodeUrl."'>";
	echo "<br>";


	$oneCode = $ga->getCode($secret);
	echo "Checking Code '$oneCode' and Secret '$secret': ";

	$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
	if ($checkResult) {
		echo 'OK';
	} else {
		echo 'FAILED';
	}
	echo "<br>";
	
	echo "TimeSlice [floor(time() / 30)]: ";
	echo $timeSlice = floor(time() / 30);
?>