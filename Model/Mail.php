<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {

    static function GetConfig() {
        return [
            "Host" => "smtp.gmail.com",
            "Username" => "namdong92@gmail.com",
            "Password" => "polgzebtetoogcip",
            "Port" => "465"
        ];
    }

    static function SendMail($mailTo, $Subject, $Body, $AltBody = "") {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet = 'UTF-8';
            $mail->Host = self::GetConfig()["Host"];                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;
            //Enable SMTP authentication
            $mail->Username = self::GetConfig()["Username"];                     //SMTP username
            $mail->Password = self::GetConfig()["Password"];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = self::GetConfig()["Port"];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom(self::GetConfig()["Username"], 'Admin lap1');
            $mail->addAddress($mailTo["Email"], $mailTo["Name"]);     //Add a recipient  
              
//            $mail->addCC('cc@example.com');
//            $mail->addCC('cc@example.com'); 
//            $mail->addBCC('bcc@example.com'); 
            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name 
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $Subject;
            $mail->Body = $Body;
            $mail->AltBody = $AltBody;
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Loi: {$e->getMessage()}";
        }
    }

}
