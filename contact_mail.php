<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// =============================
// Cloudflare Turnstile Secret Key
// =============================
$turnstileSecret = "YOUR_SECRET_KEY_HERE";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =============================
    // Cloudflare Turnstile Verification
    // =============================
    $token = $_POST['cf-turnstile-response'] ?? '';

    if (empty($token)) {
        die("Please complete the CAPTCHA.");
    }

    $data = http_build_query([
        'secret'   => $turnstileSecret,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ]);

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded",
            'method'  => "POST",
            'content' => $data
        ]
    ];

    $context = stream_context_create($options);

    $result = file_get_contents(
        "https://challenges.cloudflare.com/turnstile/v0/siteverify",
        false,
        $context
    );

    $response = json_decode($result, true);

    if (!$response['success']) {
        die("CAPTCHA verification failed.");
    }

    // =============================
    // Get Form Data
    // =============================
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $phone     = htmlspecialchars(trim($_POST['phone']));
    $email     = htmlspecialchars(trim($_POST['email']));
    $message   = htmlspecialchars(trim($_POST['message']));

    $mail = new PHPMailer(true);

    try {

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // Gmail
        $mail->Username   = 'manimalladi05@gmail.com';

        // Gmail App Password
        $mail->Password   = 'cvarqcchfjpawxvo';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender
        $mail->setFrom('manimalladi05@gmail.com', 'Website Contact Form');

        // Receiver
        $mail->addAddress('manimalladi05@gmail.com');

        // Mail Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";

        $mail->Body = "
        <h2>New Contact Form Enquiry</h2>

        <table border='1' cellpadding='10' cellspacing='0' style='border-collapse:collapse;'>

            <tr>
                <th align='left'>Full Name</th>
                <td>{$full_name}</td>
            </tr>

            <tr>
                <th align='left'>Phone</th>
                <td>{$phone}</td>
            </tr>

            <tr>
                <th align='left'>Email</th>
                <td>{$email}</td>
            </tr>

            <tr>
                <th align='left'>Message</th>
                <td>{$message}</td>
            </tr>

        </table>
        ";

        $mail->send();

        header("Location: Home.php");
        exit;

    } catch (Exception $e) {

        echo "Mail Error: " . $mail->ErrorInfo;

    }

} else {

    header("Location: Home.php");
    exit;

}