<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {

    static function GetConfig() {
        return [
            "Host" => "smtp.gmail.com",
            // "Username" => "namdong92@gmail.com",
            // "Password" => "polgzebtetoogcip",
            "Username" => "lthanhphuc99@gmail.com",
            "Password" => "rnefujzphorfomre",
            "Port" => "465"
        ];
    }

    static function SendMail($title, $content, $addressMail) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();   
            $mail->CharSet = 'utf-8';                                   //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lthanhphuc99@gmail.com';                     //SMTP username
            $mail->Password   = 'rnefujzphorfomre';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('lthanhphuc99@gmail.com', 'Phòng Khám Bác Sỹ Uyên');
            $mail->addAddress($addressMail);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            // $mail->AltBody = 'Click On This Link to Reset Password '.$link.'';
            $mail->send();
            echo "<script>alert('Mail của bạn đã được gửi đi.\nHãy kiểm tra hộp thư đến để xem kết quả');</script>";
        } catch (\Exception $e) {
            echo "Lỗi rồi kìa : {$e->getMessage()}";
        }
    }

}
