<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Antes de usarmos as classes da PHPMailer, devemos obter seu código fonte. Isso pode ser feito a partir
 *  do repositório oficial no GitHub ou via composer.
 *   git clone https://github.com/PHPMailer/PHPMailer.git
 * 
 * Ou ainda baixar todo código fonte em um arquivo que poderá ser descompactado dentro do 
 * diretório do projeto:
 * https://github.com/PHPMailer/PHPMailer/archive/master.zip
 * 
 * 
 */
require 'mailer/PHPMailerAutoload.php';

//  Exemplo Prático
// <form action="email.php" method="post">
//          <input type="text" name="assunto" placeholder="Assunto">
//          <input type="text" name="mensagem" placeholder="Mensagem">
//          <input type="submit" name="Enviar">
// </form>

if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
    $assunto = $_POST['assunto'];
}

if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
}

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'exemplo@gmail.com';
$mail->Password = 'senha';
$mail->Port = 587;

$mail->setFrom('vraalimentos@gmail.com', 'VRA Alimentos');
$mail->addAddress('vracomercio@mail.com.br', 'VRA Comércio');

// $mail->addReplyTo('no-reply@email.com.br');  // e-mail para o qual serão enviadas as respostas;
// $mail->addCC('email@email.com.br', 'Cópia');
// $mail->addBCC('email@email.com.br', 'Cópia Oculta');

$mail->isHTML(true);
$mail->Subject = $assunto;
$mail->Body    = nl2br($mensagem);
$mail->AltBody = nl2br(strip_tags($mensagem));

// $mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

//  Para depuração
//  Debug = 0 -> Desativa a depuração
//  Debug = 1 -> Exibe mensagens retornadas pelo cliente
//  Debug = 2 -> Exibe mensagens retornadas pelo cliente
//  Debug = 3 -> Exibe mensagens do cliente, servidor e status da conexão
//  Debug = 4 -> Exibe todas as mensagens, incluindo detalhes da comunicação
//  
// $mail->SMTPDebug = 3;
// $mail->Debugoutput = 'html';
// $mail->setLanguage('pt');

if (!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    header('Location: index.php?enviado');
}
?>
