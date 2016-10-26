<?php

function verify($sendermail, $username, $verficationcode, $accountype) {

    require 'vendor/autoload.php';

    $mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'weddingbudget.co.ke';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply@weddingbudget.co.ke';                 // SMTP username
    $mail->Password = 'P@ss4wb!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to
    $mail->setFrom('noreply@weddingbudget.co.ke', 'Wedding Budget');


    $mail->addAddress($sendermail);     // Add a recipient
//$mail->addAddress('elkaunda@gmail.com');               // Name is optional
    $mail->addReplyTo('noreply@weddingbudget.co.ke', 'Wedding Budget');
    $mail->addBCC('elkaunda@gmail.com');
//$mail->addBCC('mollymumbi@gmail.com');
    $mail->AddEmbeddedImage('img/logo.png', 'logo_2u');
    // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Account Verification';
    $mail->Body = 'Hi ' . $username . ',<br/>  You created a ' . $accountype . ' account on www.weddingbudget.co.ke <br/> '
            . ' In order to access your account, verify it by clicking <a href="www.weddingbudget.co.ke/verify?code=' . $verficationcode . '">here</a>.</br>'
            . 'Alternatively, copy and paste this link http://www.weddingbudget.co.ke/verify.php?code=' . $verficationcode . ' on your browser.'
            . ''
            . '<br/>Thanks,'
            . ''
            . '</hr><br/><img src="cid:logo_2u" alt="The wedding budget team." width="150px"><br/></hr>';
    $mail->AltBody = '';
    $resp = "";
    if (!$mail->send()) {

        $resp = 'Mailer Error: ' . $mail->ErrorInfo;
    } else {

        $resp = 'Message has been sent';
    }
    return $resp;
}



function anymail($sendermail,$sendername, $dyn_subject,$dyn_body) {

    require 'vendor/autoload.php';

    $mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'weddingbudget.co.ke';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $sendermail;                 // SMTP username
    $mail->Password = 'P@ss4wb!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to
    $mail->setFrom($sendermail, $sendername);


    $mail->addAddress($sendermail);     // Add a recipient
//$mail->addAddress('elkaunda@gmail.com');               // Name is optional
    $mail->addReplyTo($sendermail, $sendername);
    $mail->addBCC('elkaunda@gmail.com');
    $mail->addBCC('mollymumbi@gmail.com');
    $mail->AddEmbeddedImage('img/logo.png', 'logo_2u');
    // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $dyn_subject;
    $mail->Body = $dyn_body;
    $mail->AltBody = '';
    $resp = "";
    if (!$mail->send()) {

        $resp = 'Mailer Error: ' . $mail->ErrorInfo;
    } else {

        $resp = 'Message has been sent';
    }
    return $resp;  
    
}
