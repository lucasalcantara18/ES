<?php
session_start();
if(($_SESSION["nivel"] == "Cliente")){
	    session_unset(); 
		session_destroy(); 
		header("Location:index.php");
	}
?>




<?php

include "Conexao.php";
include "\CodPhp\Cadastro_Prod_SF.php";
include "auxiliar.php";
  
	
	
?>

<!DOCTYPE html>

<html>


<head>
	<title>Cadastrar Produto</title>

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
						<h3 class="panel-title">Cadastro de Produtos</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Cadastro_Prod_SF.php">
						
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_nome" placeholder="Nome" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Tipo</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_tipo" placeholder="Tipo" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Status</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_status" placeholder="Status" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Receita</label>
								<div class="col-sm-5">
									<input type="radio" name="prod_receita" value="Sim" checked> Sim<br>
									<input type="radio" name="prod_receita" value="Nao"> Nao<br>
								</div>
							</div>

							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Descricao</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_descricao" placeholder="Descricao" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Fabricante</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_fabri" placeholder="Fabricante" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Validade</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_validade" placeholder="Validade" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Gramatura</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="" name="prod_gramat" placeholder="Gramatura" />
								</div>
							</div>
							
							<input type="hidden" name="prod_cod_func" value="<?php echo $_SESSION['cod']; ?>" />
							
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Cadastrar</button>
									<a class="btn btn-primary" 
									<?php
									
									   if($_SESSION['nivel'] == "Administrador"){
										   echo "href="."indexadmin.php".">Voltar</a>";
									   }else{
										   echo "href="."indexfunc.php".">Voltar</a>"; 
									   }
									
									
									?>
									
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
					prod_nome: "required",
					prod_tipo: "required",
					prod_status: "required",
					prod_descricao: "required",
					prod_fabri: "required",
					prod_validade: "required",
					prod_gramat: "required",
					
					prod_nome: {
						required: true,
						minlength: 2,
						maxlength: 25
					},
					
					prod_tipo: {
						required: true,
						minlength: 2,
						maxlength: 25
					},
					
					prod_status: {
						required: true,
						minlength: 2,
						maxlength: 25
					},
					
					prod_descricao: {
						required: true,
						minlength: 2,
						maxlength: 250
					},
					
					prod_fabri: {
						required: true,
						minlength: 2,
						maxlength: 20
					},
					
					prod_validade: {
						required: true,
						date: true
					},
					
					prod_gramat: {
						required: true,
						minlength: 2,
						maxlength: 25
					},
					
					
					agree1: "required"
				},
				messages: {
					
					prod_nome: {
						required: "Por Favor, entre com seu Nome",
						minlength: "Seu Nome deve ter no minimo 2 caracteres",
						maxlength: "Seu Nome deve ter no maximo 25 caracteres"
						
					},		
					prod_tipo: {
						required: "Por Favor, entre com o Tipo do Produto",
						minlength: "O Produto deve ter no minimo 2 caracteres",
						maxlength: "O Produto deve ter no maximo 25 caracteres"
					},
					
					prod_status: {
						required: "Por Favor, entre com o Status do Produto",
						minlength: "O Status deve ter no minimo 2 caracteres",
						maxlength: "O Status deve ter no maximo 25 caracteres"
					},
					
					prod_descricao: {
						required: "Por Favor, entre com a Descrição do Produto",
						minlength: "A Descrição deve ter no minimo 2 caracteres",
						maxlength: "A Descrição deve ter no maximo 25 caracteres"
					},
					
					prod_fabri: {
						required: "Por Favor, entre com o Fabricante do Produto",
						minlength: "O Fabricante deve ter no minimo 2 caracteres",
						maxlength: "O Fabricante deve ter no maximo 25 caracteres"
					},
					
					prod_validade: {
						required: "Por Favor, entre com a Validade do Produto",
						url: "Por favor insira uma Data válida"
					},
					
					prod_gramat: {
						required: "Por Favor, entre com a Gramatura do Produto",
						minlength: "A Gramatura deve ter no minimo 2 caracteres",
						maxlength: "A Gramatura deve ter no maximo 25 caracteres"
					},
					
					
					
					
					
					
					
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
