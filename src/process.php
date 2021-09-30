<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();

//require
use Laminas\Validator\EmailAddress;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

//constants
$name = $_POST['name'];
$email = $_POST['email'];
$complaint = $_POST['complaint'];

$log = new Logger('info-log');
$log->pushHandler(new StreamHandler('info.log', Logger::INFO));
$log->info("$name - $email - $complaint");
//$log->info('test');


// Check if name, email and message are given
if (!empty($name) && !empty($email) && !empty($complaint)) {
    $validator = new EmailAddress();
    if($validator->isValid($email)){

        $phpmailer = new PHPMailer(true);

        try {
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'c07ec11f191672';
            $phpmailer->Password = '7897b00ab200e7';

            //Recipients
            // $phpmailer->setFrom('from@example.com', 'Mailer');
            $phpmailer->addAddress($email);               //Name is optional
            $phpmailer->addCC('40187960@roctilburg.nl');

            //Content
            $phpmailer->isHTML(false);
            $phpmailer->Subject = 'Klachtverwerking';
            $phpmailer->Body = $complaint;

            $phpmailer->send();
            $_SESSION["success"] = "Uw klacht is in behandeling.";
        } catch (Exception $e) {
            $_SESSION["warning"] = "Het E-mail-bericht kon niet verstuurd worden.";
            echo $e->getMessage();
        }
    } else
        $_SESSION["warning"] = "Het E-mail-adres is invalide.";
} else
    $_SESSION["warning"] = "Alle velden moeten ingevuld zijn.";

echo "<br>" . $_SESSION["warning"] . $_SESSION["success"];

// header("Location: /");
