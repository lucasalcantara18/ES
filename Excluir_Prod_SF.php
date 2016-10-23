<?php
session_start();
include "auxiliar.php";
if(($_SESSION["nivel"] == "Cliente")){
	    session_unset(); 
		session_destroy(); 
		header("Location:index.php");
	}
?>

<html>
    <head><title>DeletarFuncionarios </title></head>
    <body>



        <form method='POST' action='Excluir_Prod_SF.php'>

            Digite o codigo do Produto:
            <input type = 'text' name = 'prod_cod' />
			<input type = 'hidden' name = 'cod_func' value = '2' />
            <input type = 'submit' name = "pesquisar" value = "Pesquisar"/><br>
			
		</form>

    </body>
</html>

<!DOCTYPE html>
<html>
<?php
include "Conexao.php";
include "\CodPhp\Excluir_Prod_SF.php"
?>

<head>
	<title>Excluir Produto</title>

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
						<h3 class="panel-title">Exclusão de Produtos</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Excluir_Prod_SF.php">
						
							<input type="hidden" name="prod_codd" value='<?php echo $_REQUEST["prod_codd"] ?>'/>
						
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="prod_nome" placeholder="Nome" readonly="readonly" value="<?php echo $_REQUEST['prod_nome']; ?>"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Tipo</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_tipo" placeholder="Tipo" readonly="readonly" value="<?php echo $_REQUEST["prod_tipo"]; ?>"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Status</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_status" placeholder="Status" readonly="readonly" value="<?php echo $_REQUEST["prod_status"]; ?>"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Receita</label>
								<div class="col-sm-5">
									<input type="radio" name="prod_receita" value="Sim" checked readonly="readonly"> Sim<br>
									<input type="radio" name="prod_receita" value="Nao" readonly="readonly"> Nao<br>
								</div>
							</div>

							
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Descricao</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_descricao" placeholder="Descricao" readonly="readonly" value="<?php echo $_REQUEST["prod_descricao"]; ?>"/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Fabricante</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_fabri" placeholder="Fabricante" readonly="readonly" value="<?php echo $_REQUEST["prod_fabri"]; ?>"/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Validade</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_validade" placeholder="Validade" readonly="readonly" value="<?php echo $_REQUEST["prod_validade"]; ?>"/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Gramatura</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="prod_gramat" placeholder="Gramatura" readonly="readonly" value="<?php echo $_REQUEST["prod_gramat"]; ?>"/>
								</div>
							</div>
							
							<input type="hidden" name="prod_cod_func" value="<?php echo $_REQUEST["prod_cod_func"]; ?>" />
							
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-danger" name="signup1" value="Sign up">Excluir</button>
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
				
				},
				messages: {
					
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
