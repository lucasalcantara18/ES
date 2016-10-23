<?php
session_start();
include "auxiliar.php";
include "Conexao.php";
	include "\CodPhp\Alterar_Cli_SF.php";

if(($_SESSION["nivel"] == "Funcionario")||($_SESSION["nivel"] == "Administrador")){
	    session_unset(); 
		session_destroy(); 
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<?php
	
?>


<head>
	<title>Alteração de Conta</title>

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
						<h3 class="panel-title">Alteração de Conta</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Alterar_Cli_SF.php">
						
							<input type="hidden" name="cli_codd" value='<?php echo $_REQUEST["cli_codd"] ?>'/>
						
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">CPF</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="cli_cpf" placeholder="CPF" value='<?php echo $_REQUEST["cli_cpf"] ?>'/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_nome" placeholder="Nome" value='<?php echo $_REQUEST["cli_nome"] ?>'/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="email1">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email1" name="cli_email" placeholder="Email" value='<?php echo $_REQUEST["cli_email"] ?>'/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="username1">Login</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username1" name="cli_login" placeholder="Login" value='<?php echo $_REQUEST["cli_login"] ?>'/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="cli_senha" placeholder="Password" value='<?php echo $_REQUEST["cli_senha"] ?>'/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Confirm password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="cli_conf_senha" placeholder="Confirm password" value='<?php echo $_REQUEST["cli_conf_senha"] ?>'/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Endereco</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_end" placeholder="Endereco" value='<?php echo $_REQUEST["cli_end"] ?>'/>
								</div>
							</div>
							
							<input type="hidden" name="cli_nivel" value="Cliente" />
							
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Alterar</button>
									<a class="btn btn-primary" href="indexcli.php">Voltar</a>
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
					cli_cpf: "required",
					lastname1: "required",
					cli_nome: {
						required: true,
						minlength: 5
					},
					cli_login:{
						required: true,
						minlength: 5
					},
					cli_senha: {
						required: true,
						minlength: 5
					},
					cli_conf_senha: {
						required: true,
						minlength: 5,
						equalTo: "#password1"
					},
					cli_email: {
						required: true,
						email: true
					},
					cli_end: {
						required: true,
						minlength: 10
					},
					
				},
				messages: {
					cli_cpf: "Por Favor, entre com seu CPF",
					lastname1: "Please enter your lastname",
					cli_login:{
						required: "Por Favor, entre com seu Login",
						minlength: "Seu login deve ter no minimo 5 caracteres"
					},
					cli_nome: {
						required: "Por Favor, entre com seu Nome",
						minlength: "Seu nome deve ter no minimo 5 caracteres"
					},
					cli_senha: {
						required: "Por Favor, entre com sua Senha",
						minlength: "Sua Senha deve ter no minimo 5 caracteres"
					},
					cli_end: {
						required: "Por Favor, entre com seu Endereço",
						minlength: "Seu endereço deve ter no minimo 10 caracteres"
					},
					cli_conf_senha: {
						required: "Por Favor, entre com sua Senha",
						minlength: "Sua Senha deve ter no minimo 5 caracteres",
						equalTo: "Por Favor, as senhas devem ser a mesma"
					},
					cli_email: "Por favor insira um endereço de e-mail válido",
					
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
