<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = htmlspecialchars($_POST['full_name']);
    $phone     = htmlspecialchars($_POST['phone']);
    $email     = htmlspecialchars($_POST['email']);
    $message   = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // YOUR GMAIL
        $mail->Username   = 'manimalladi05@gmail.com';

        // APP PASSWORD
        $mail->Password   = 'cvarqcchfjpawxvo';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('manimalladi05@gmail.com', 'Website Contact Form');

        // Mail Receive Address
        $mail->addAddress('manimalladi05@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";

        $mail->Body = "
        <h2>New Contact Form Enquiry</h2>

        <table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>Name</th>
                <td>{$full_name}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{$phone}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{$email}</td>
            </tr>

            <tr>
                <th>Message</th>
                <td>{$message}</td>
            </tr>
        </table>
        ";

        $mail->send();

        header("Location: index.php");
        // header("Location: thank-you.php");
        exit;

    } catch (Exception $e) {

        echo "Mail Error : " . $mail->ErrorInfo;

    }
}
?>