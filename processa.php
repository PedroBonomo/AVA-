<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    // Configurações do e-mail
    $para = "caio.vmangueira@gmail.com";  // Substitua pelo seu e-mail
    $assunto = "Novo contato do site";
    $corpo = "Você recebeu uma nova mensagem do formulário de contato:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
    }
}
?>