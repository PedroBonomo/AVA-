<?php
// filepath: c:\wamp64\www\AVA-\processa.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : "";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
    $mensagem = isset($_POST["mensagem"]) ? htmlspecialchars($_POST["mensagem"]) : "";

    $mail = new PHPMailer(true);

    try {
       // Looking to send emails in production? Check out our Email API/SMTP product!
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '0874ec67a76f90';
    $phpmailer->Password = '71392756a6ea5e';

        // Configurações do e-mail
        $mail->setFrom('seuemail@gmail.com', 'Seu Nome');
        $mail->addAddress('caio.v.mangueira@gmail.com'); // Destinatário
        $mail->Subject = 'Novo contato do site';
        $mail->Body = "Você recebeu uma nova mensagem do formulário de contato:\n\n"
                    . "Nome: $nome\n"
                    . "E-mail: $email\n"
                    . "Mensagem:\n$mensagem\n";

        $mail->send();
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
    }
}
?>