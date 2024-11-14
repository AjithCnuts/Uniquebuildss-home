<?php
// contact-submit.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['userName'];
    $phone = $_POST['userPhone'];
    $email = $_POST['userEmail'];
    $message = $_POST['userMessage'];

    // You can perform any further validation or sanitization here

    // Send email
    $to = "your-email@example.com"; // Your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    // Send email (use mail() function or any email service)
    if(mail($to, $subject, $body, $headers)) {
        echo json_encode(['type' => 'success', 'text' => 'Your message has been sent successfully.']);
    } else {
        echo json_encode(['type' => 'error', 'text' => 'There was an issue sending your message. Please try again later.']);
    }
}
?>
