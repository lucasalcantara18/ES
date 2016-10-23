<?php
include "Conexao.php";
	if(isset($_POST["ok"])){ 
		// Fazer tratamento de Email válido para dps mostrar a frase de Email Enviado com sucesso
		if($_REQUEST["email"] == ""){
			echo "Informe o email para enviar a nova senha";
		}else{
			//echo "Email Enviado com sucesso ";
			$novasenha = substr(md5(time()),0,6);
			$nscriptografada = md5(md5($novasenha)); 
			//echo "Senha Gerada: $novasenha "; 
			//echo "\nSenha Gerada Criptografada: $nscriptografada ";
			echo "Senha Gerada:".$novasenha." \n Senha Gerada Criptografada: ". $nscriptografada;

		}
		

	}
?>




<html>
<head>
	<meta charset="UTF-8"/>
</head>
<body>

<form method ="POST" action="">
	<input placeholder="Seu E-mail" name="email" type="text">
	<input name="ok" value="ok" type="submit">

</form>

</body>
</html>