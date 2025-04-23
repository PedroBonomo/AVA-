<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : "";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
    $mensagem = isset($_POST["mensagem"]) ? htmlspecialchars($_POST["mensagem"]) : "";

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Mailtrap
        $mail->SMTPAuth = true;
        $mail->Port = 465; // Porta do Mailtrap
        $mail->Username = 'caio.v.mangueira@gmail.com'; // Seu usuário do Mailtrap
        $mail->Password = 'erpi wigl stto tbiw'; // Sua senha do Mailtrap
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilita a criptografia TLS
        // Configurações do e-mail
        $mail->setFrom('caio.v.mangueira@gmail.com', 'Caio'); // Seu e-mail e nome
        $mail->addAddress('linkedinmelo45@gmail.com'); // E-mail que receberá as mensagens
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
    var_dump($_POST);
exit;
}
?>