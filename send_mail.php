<?php 
    // $email=get_safe_value($con,$_POST['email']);
	
	// $check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
	// if($check_user>0){
	// 	echo "email_present";
	// 	die();
	// }
	
	$otp=rand(1111,9999);
	$_SESSION['EMAIL_OTP']=$otp;
	$html="$otp is your otp";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="avidyarthi513@gmail.com";
	$mail->Password="aryanvdy@5502";
	$mail->SetFrom("avidyarthi513@gmail.com");
	$mail->addAddress('phulwanikashish46@gmail.com');
	$mail->IsHTML(true);
	$mail->Subject="New OTP";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		
	}

?>