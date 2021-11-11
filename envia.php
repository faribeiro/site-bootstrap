<?php
	/*
	Verifica o Sistema operacional para
	gerar o código de retorno de linha
	*/
	if (PHP_OS =="Linux") $quebra_linha = "\n";
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n";
	else die("Este script não roda no seu servidor");

	//Recuperando as variáveis do POST
	//Este e-mail deve existir no provedor
	$origem = "contato@shefarol.com.br";
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$fone = $_POST['fone'];
	$comentario = $_POST['comentario'];
	$destinatario = 'fb.ribeiro@hotmail.com';
	$assunto = 'Contato Web';

	//Formatar a mensagem
	$msg = "<b>Nome: </b>" . $nome . " " . $sobrenome . "<br>";
	$msg .= "<b>E-mail :</b>" . $email . "<br>";
	$msg .= "<b>Fone: </b>" . $fone . "<br>";
	$msg .= "<b>Comentário: </b>" . $comentario . "<br>";

	//Criando o cabeçalho do e-mail
	$header = "MIME-Version: 1.1" . $quebra_linha;
	$header .= "Content-type: text/html; charset=utf-8" . $quebra_linha;
	$header .= "From: " . $origem . $quebra_linha;
	$header .= "Return-Path: " . $email . $quebra_linha;

	//Enviando o e-mail
	if (!mail($destinatario, $assunto, $msg, $header, "-r".$origem)){
		mail($destinatario, $assunto, $msg, $header);
	}

	//Redireciona para a página obrigado.html
	echo("<meta http-equiv='refresh' content='1;URL=obrigado.html'>");
?>