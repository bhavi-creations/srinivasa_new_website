<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = htmlspecialchars(trim($_POST['full_name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $appointment_date = htmlspecialchars(trim($_POST['appointment_date'] ?? ''));
    $appointment_time = htmlspecialchars(trim($_POST['appointment_time'] ?? ''));
    $message = nl2br(htmlspecialchars(trim($_POST['message'] ?? '')));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'manimalladi05@gmail.com';
        $mail->Password = 'cvarqcchfjpawxvo';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('manimalladi05@gmail.com', 'Appointment Form');
        $mail->addAddress('manimalladi05@gmail.com');

        if (!empty($email)) {
            $mail->addReplyTo($email, $full_name);
        }

        $mail->isHTML(true);
        $mail->Subject = "New Appointment Booking";

        $mail->Body = "
            <h2>New Appointment Booking</h2>
            <table border='1' cellpadding='10' cellspacing='0'>
                <tr><th>Full Name</th><td>{$full_name}</td></tr>
                <tr><th>Phone</th><td>{$phone}</td></tr>
                <tr><th>Email</th><td>{$email}</td></tr>
                <tr><th>Date</th><td>{$appointment_date}</td></tr>
                <tr><th>Time</th><td>{$appointment_time}</td></tr>
                <tr><th>Message</th><td>{$message}</td></tr>
            </table>
        ";

        $mail->send();

        header("Location: Home.php");
        // header("Location: thank-you.php");
        exit;

    } catch (Exception $e) {
        echo "Mail Error: " . $mail->ErrorInfo;
    }
}
?>