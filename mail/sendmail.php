<?php

include "PHPMailer/PHPMailer/src/SMTP.php";
include  "PHPMailer/PHPMailer/src/PHPMailer.php";
include  "PHPMailer/PHPMailer/src/Exception.php";
//include  "PHPMailer/PHPMailer/src/OAuth.php";
include "PHPMailer/PHPMailer/src/POP3.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mailer{
    public function mailhoadon($gmail,$tieude,$noidung){
        $mail = new PHPMailer(true);
        $mail -> CharSet='utf8';
    //print_r($mail);

        try {
            //Server settings
            $mail->SMTPDebug = 0;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'huynhhuy12149@gmail.com';// SMTP username
            $mail->Password = 'hulkztqkoendmgnx'; // SMTP password
            $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('huynhhuy12149@gmail.com', 'Mailer');
            $mail->addAddress($gmail, 'Joe User'); // Add a recipient
            // $mail->addAddress('ellen@example.com'); 
            // // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            
        } catch (Exception $e) {
            echo "Đơn Hàng Thất Bại";
        }
    }
    

}

?>