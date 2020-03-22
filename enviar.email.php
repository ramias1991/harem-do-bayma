<?php

if(isset($_POST["nome"]) && !empty($_POST["nome"])){
	$nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    $assunto = addslashes($_POST['assunto']);
	$msg = addslashes($_POST["msg"]);

    $para = "contato@haremdobayma.com";
    $assunto = "<strong>Assunto: </strong>" . $assunto;
	$corpo = "<strong>Nome: </strong>".$nome."\r\n";
	$corpo .= "<strong>Email: </strong>".$email."\r\n";
	$corpo .= "<strong>Mensagem: </strong>".$msg;
	$cabecalho = "From: $email"."\r\n";
	$cabecalho .= "Reply-To: ".$email."\r\n";
	$cabecalho .= "X-Mailer: PHP/".phpversion();

	if(mail($para, $assunto, $corpo, $cabecalho, '-r'.$email)){
        echo '<script>';
        echo "alert('E-mail enviado! Em breve responderemos seu contato!'); location.href = 'contato.php'";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('Não foi possível enviar seu e-mail! Tente novamente mais tarde!'); location.href = 'contato.php'";
        echo '</script>';
    }
}