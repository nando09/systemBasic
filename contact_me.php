<?php

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$email_subject = "Contato pelo site:  $name";

$email_body = "Nova mensagem recebida.\n\n"."Detalhes do e-mail:\n\nNome: $name\n\nE-mail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";

// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$to = 'softica@softica.com.br';
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/plain; charset=UTF-8\n";
$headers .= "From: softica@softica.com.br\n"; // remetente
$headers .= "Return-Path: softica@softica.com.br\n"; // return-path
$headers .= "Reply-To: $email_address\n";
$envio = mail("softica@softica.com.br", $email_subject, $email_body, $headers, "-r".'softica@outlook');
 
if($envio)
 echo "Mensagem enviada com sucesso seis!";
else
 echo "A mensagem não pode ser enviada";
?>