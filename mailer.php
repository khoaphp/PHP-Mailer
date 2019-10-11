<?php
header('Content-Type: text/html; charset=utf-8');
function mailer($emaiNhan,$tenNguoinhan,$subject,$content){
	require ('src/PHPMailer.php');
	$mail = new PHPMailer(true);    
	$mail->CharSet = 'UTF-8'; 
	try {
	    $mail->SMTPDebug = 0;
	    $mail->isSMTP();                                     
	    $mail->Host = 'smtp.gmail.com'; 
	    $mail->SMTPAuth = true;                     
		$mail->Username = ''; 
        $mail->Password = ''; 
	    $mail->SMTPSecure = 'tls';                        
	    $mail->Port = 587;
		$mail->setFrom('','Khoa Phạm Training');
		$mail->addAddress($emaiNhan,$tenNguoinhan);
	    //$mail->addReplyTo($emaiNhan, $tenNguoinhan);
	    $mail->isHTML(false);                                
	    $mail->Subject = $subject;
	    $mail->Body    = $content;
	    $mail->send();
	    return true;
	} 
	catch (Exception $e) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    return false;
	}
}
