<?php
require 'vendor/autoload.php';  // Include the Composer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Form 1: Standard submission form (send_email.php)
    if (isset($_POST['name']) && isset($_POST['email'])) {
        // Capture form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $location = $_POST['location'];

        // Create the email body content
        $message = "Name: $name<br>Email: $email<br>Mobile: $mobile<br>Location: $location";

        // PHPMailer setup for form 1
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
            echo 'Message has been sent (Form 1)';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    // Form 2: Contact form (ID: contact-form)
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        // Capture form 2 data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $messageContent = $_POST['message'];

        // Create the email body content for form 2
        $message = "Name: $name<br>Email: $email<br>Mobile: $mobile<br>Message: $messageContent";

        // PHPMailer setup for form 2
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
            $mail->Subject = 'Contact Form Submission';
            $mail->Body    = $message; // Include the form data in the email body

            // Send the email
            $mail->send();
            echo 'Message has been sent (Form 2)';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
