<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Envio de Email</title>
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './lib/vendor/autoload.php';

    $mail = new PHPMailer(true);

    // Configurações do SMTP
    $mail->IsSMTP();
    $mail->SMTPDebug = false;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'email-ssl.com.br';
    $mail->Port = 465;
    $mail->Username = 'email do smtp';
    $mail->Password = 'senha do email';
    $mail->SetFrom('ramtrigo@rtrigo.com.br', 'Envio de Senha');
    $mail->addAddress('ramtrigo@hotmail.com', 'teste de envio');
    $mail->Subject = "Recuperação de Senha";
    $mail->msgHTML("Sua senha é:  ");

    try {
        $mail->send();
        echo "E-mail enviado!";
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }

    ?>
</body>

</html>
