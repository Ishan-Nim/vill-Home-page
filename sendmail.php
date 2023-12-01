

<?php
// Include the required PHPMailer classes
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set SMTP server details
$host = 'mail.privateemail.com';
$port = 587;
$username = 'taguchi@vill.design';
$password = 'vill2023';
$secure = 'tls'; // TLS or SSL

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

if(!isset($_POST['email'])){
    echo "email is empty";
}else{
    if(!isset($_POST['name'])){
        echo "name is empty";
    }else{
        if(!isset($_POST['message'])){
            echo "message is empty";
        }else{

            try {
                $mail->isSMTP();
                $mail->Host = $host;
                $mail->SMTPAuth = true;
                $mail->Username = $username;
                $mail->Password = $password;
                $mail->SMTPSecure = $secure;
                $mail->Port = $port;
            
                // Set sender and recipient information
                $mail->setFrom('taguchi@vill.design', 'Vill design');
                $mail->addAddress('tcrack3r@gmail.com', 'Recipient Name');
            
                // Set email subject and body
                $mail->Subject = "mail from  : ".htmlspecialchars($_POST['email']);
                $mail->Body ="subject ".htmlspecialchars($_POST['name']). "message ".htmlspecialchars($_POST['message']);
            
                // Send the email
                if ($mail->send()) {
                    echo 'Email sent successfully';
                } else {
                    echo 'Email sending failed: ' . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                echo 'Email sending failed: ' . $e->getMessage();
            }
            
        }
    }
}

