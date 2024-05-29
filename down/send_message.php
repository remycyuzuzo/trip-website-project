<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "./res/php-mailer/src/Exception.php";
require "./res/php-mailer/src/PHPMailer.php";
require "./res/php-mailer/src/SMTP.php";

// Instantiation and passing `true` enables exceptions handling
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();                                             // Send using SMTP
    $mail->Host       = 'mail.trip-terimbere.org';                 // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
    $mail->Username   = 'admin@trip-terimbere.org';            // SMTP username
    $mail->Password   = 'Remy&24177';                             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $sent_from = $_POST['email'];
    $sender_name = $_POST['fname'] . " " . $_POST['lname'];

    $mail->setFrom("mailer@trip-terimbere.org", "TRIP Contact Us Form");
    $mail->addReplyTo($sent_from, $sender_name);    // Add a recipient
    $mail->addAddress('contact@trip-terimbere.org', 'TRIP Terimbere');     // Add a recipient
    $mail->addBCC('remycyuzuzo@gmail.com');

    // Content
    $msg_subject = $_POST['subject'];
    $msg_body = '
        <div style="width: 100%; padding: 10px; background-color: #f2f2f2;">
            <div>
                    <h1>TRIP Terimbere Organization</h1><br>
                    <small>New message sent from the contact us form</small>
            </div>
            <div>
                <h3>From: </h3>
                <p>
                    ' . htmlspecialchars($sender_name) . '<br>
                    ' . htmlspecialchars($sent_from) . '<br>
                    ' . htmlspecialchars($_POST['tel']) . '<br>
                    ' . htmlspecialchars($_POST['country']) . '<br>

                </p>
            </div>
            <div>
                ' . htmlspecialchars($_POST["message"])  . '
            </div>
            
        </div>
        
    ';

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Body    = $msg_body;
    $mail->AltBody = "Message is: \"" . $_POST['message'] . "\" Sent fom " . $sender_name . " with address of " . $sent_from;
    $mail->Subject = $_POST['subject'];
    $mail->send();
    $_SESSION['sent'] = 'Message has been sent';
    echo '
        <script>
            window.location="/contact-us";
        </script>
    ';
} catch (Exception $e) {
    $_SESSION['failed'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
