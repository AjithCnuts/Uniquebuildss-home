<?php
require 'vendor/autoload.php';  // Include the Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $location = $_POST['location'];

    // Create the email body content
    $message = "Name: $name<br>Email: $email<br>Mobile: $mobile<br>Location: $location";

    // PHPMailer setup
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cnuts.internal01@gmail.com';  // Your Gmail address
        $mail->Password   = 'nehi boeq fcbg gdfz';    // Your Gmail app password (create one if needed)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name); // Sender's email and name
        $mail->addAddress('cnuts.internal01@gmail.com', 'Ajith');  // Recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Talk to our Expert';
        $mail->Body    = $message; // Include the form data in the email body

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
