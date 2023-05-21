<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{

    public static $Host;
    public static $Username;
    public static $Password;
    public static $FromMail;
    public static $FromName;
    public static $Port;

    public function __construct($config = null)
    {
        if ($config) {
            self::$Host = $config["Host"] ?? null;
            self::$Username = $config["Username"] ?? null;
            self::$Password = $config["Password"] ?? null;
            self::$FromMail = $config["FromMail"] ?? null;
            self::$FromName = $config["FromName"] ?? null;
            self::$Port = $config["Port"] ?? null;
        }

    }



    function SendMail($title, $content, $addressMail, $fileAttachment = [])
    {
        if ($addressMail == "") {
            return;
        }

        $addressMail = explode(";", $addressMail);
 
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->Host = self::$Host;
            $mail->SMTPAuth = true;
            $mail->Username = self::$Username;
            $mail->Password = self::$Password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = self::$Port;
            $mail->setFrom(self::$FromMail, self::$FromName);
            foreach ($addressMail as $key => $value) {
                $mail->addAddress($value);
            }

            if ($fileAttachment) {
                foreach ($fileAttachment as $key => $value) {
                    $mail->addAttachment($value, basename($value));
                }
            }
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $content;
            $mail->send();
        } catch (\Exception $e) {

        }
    }

}