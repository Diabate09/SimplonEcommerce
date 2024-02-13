<?php

    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    function sendMail(string $usermail, string $username, string $object, string $body)
    {
        $res = ["status" => false, "msg" => ""];

        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = "mail.infomaniak.com";
            $mail->CharSet    = 'UTF-8';
            $mail->Port       = 465;
            $mail->SMTPAuth   = true;
            $mail->Username   = 'service.commercial@tititourisme.com';
            $mail->Password   = 'AjQ8u#c2_Q15.';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $mail->setFrom('service.commercial@tititourisme.com', 'Salimata Boutique');
            $mail->addAddress($usermail, $username);
            $mail->addReplyTo('service.commercial@tititourisme.com', 'Service Clientèle');

            $mail->isHTML(true);

            $mail->Subject = $object;
            $mail->Body    = $body;

            // Active la journalisation SMTP
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            if ($mail->send()) {
                $res = ["status" => true, "msg" => ""];
            } else {
                $res = ["status" => false, "msg" => "Une erreur s'est produite lors de l'envoi de mail: " . $mail->ErrorInfo];
            }
        } catch (Exception $e) {
            $res = ["status" => false, "msg" => $e->getMessage()];
        }

        echo json_encode($res);
    }


?>
