<?php
    session_start();
	include "Conexao.php";
	include "auxiliar.php";
	include "\CodPhp\Cadastro_Func_SF.php";
	if(($_SESSION["nivel"] == "Funcionario")||($_SESSION["nivel"] == "Cliente")){
		 echo "<h2 style='color: red'> Acesso Negado! </h2>";
		sleep(5);
	    session_unset(); 
		session_destroy(); 
		header("Location:index.php");
	}
	
	
	
?>		

<!DOCTYPE html>
<html>

	
							

<head>
	<title>Cadastro de Funcionarios</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

	<script type="text/javascript" src="jquery-1.11.1.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<br>				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Cadastro de Funcionarios</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Cadastro_Func_SF.php">
						
							
							<div class="form-group" id="teste">
								<label class="col-sm-4 control-label" for="firstname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="func_nome" placeholder="Nome" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="username1">Login</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username1" name="func_login" placeholder="Login" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="func_senha" placeholder="Senha" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Confirmar Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="func_conf_senha" placeholder="Confirmar Senha" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Tipo</label>
								<div class="col-sm-5">
									<input type="radio" name="func_nivel" value="Funcionario" checked> Funcionario<br>
									<input type="radio" name="func_nivel" value="Administrador"> Administrador<br>
								</div>
							</div>

						
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Cadastrar</button>
									<a class="btn btn-primary" href="indexadmin.php">Voltar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		

		$( document ).ready( function () {
			$( "#signupForm1" ).validate( {
				rules: {
					func_nome: "required",
					lastname1: "required",

					func_login: {
						required: true,
						minlength: 2,
						maxlength: 20
					},
					func_senha: {
						required: true,
						minlength: 5,
						maxlength: 20
					},
					func_conf_senha: {
						required: true,
						minlength: 5,
						equalTo: "#password1",
						maxlength: 20
					},
					email1: {
						required: true,
						email: true
					},
					agree1: "required"
				},
				messages: {
					func_nome: "Por Favor, entre com seu Nome",
					lastname1: "Please enter your lastname",
					func_login: {
						required: "Por Favor, entre com seu Login",
						minlength: "Seu login deve ter no minimo 2 caracteres"
					},
					func_senha: {
						required: "Por Favor, entre com sua Senha",
						minlength: "Sua Senha deve ter no minimo 5 caracteres"
					},
					func_conf_senha: {
						required: "Por Favor, entre com sua Senha",
						minlength: "Sua Senha deve ter no minimo 5 caracteres",
						equalTo: "Por Favor, as senhas devem ser a mesma"
					},
					email1: "Please enter a valid email address",
					agree1: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
</body>
</html>
