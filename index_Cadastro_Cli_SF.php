<?php
 session_start();


?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Drogavas - O melhor lugar para a compra de seus medicamentos</title>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

	<script type="text/javascript" src="jquery-1.11.1.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="structure.css">
	
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">
	
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 0px solid #dddddd;
			text-align: center;
			padding: 5px;
		}
		
		
    </style>
	
	
</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">DROGAVAS</a>
            </div>

			
			
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">Home</a>
                    </li>					                   					
                    <li>
                        <a  href="#portfolio" target="_blank">Sobre</a> 
                    </li> 
					<li>
                        <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								Contato
								<b class="caret"></b>
							  </a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">Teste</ul>
						
						
                    </li>
					
					<li>
                       
							  <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								Login
								<b class="caret"></b>
							  </a>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<form class="box login">
									<?php
	                             include "Conexao.php";
	
	                             if (isset($_REQUEST["akicaramba"])){
		                           
		
									if ($_REQUEST["login"]=="" or $_REQUEST["senha"]=="" ) {
											echo "<h2 style='color: red'>Campos obrigatórios em branco</h2>";
									} else {
												
																						
												$sqli = "select c.Cli_CPF as Cod, c.Cli_Login as Login, c.Cli_Senha as Senha, c.Cli_Nome as Nome, c.Cli_Nivel as Nivel  
												        from cliente c 
														where c.cli_login = ('".$_REQUEST["login"]."') and c.cli_senha = ('".$_REQUEST["senha"]."') 
														
														UNION 
														
														select f.Func_CodFuncionario as Cod, f.Func_Login as Login, f.Func_Senha as Senha, f.Func_Nome as Nome, f.Func_Nivel as Nivel 
														from funcionario f 
														where f.func_login = ('".$_REQUEST["login"]."') and f.func_senha = ('".$_REQUEST["senha"]."') ";
												 $qryv = mysql_query($sqli, $con);
												 $resv = mysql_fetch_array($qryv);
											
											     if($resv["Nivel"] == "Cliente"){
													
													 $_SESSION["nivel"] = $resv["Nivel"];
													 $_SESSION["cod"] = $resv["Cod"];
													 $_SESSION["nome"] = $resv["Nome"];
													 $_SESSION["login"] = $resv["Login"];
													 
													 header("Location:indexcli.php");
													 
												 }else if ($resv["Nivel"] == "Funcionario"){
													  
													   
													 $_SESSION["nivel"] = $resv["Nivel"];
													 $_SESSION["cod"] = $resv["Cod"];
													 $_SESSION["nome"] = $resv["Nome"];
													 $_SESSION["login"] = $resv["Login"];
													 header("Location:indexfunc.php");
												 }else if ($resv["Nivel"] == "Administrador"){
													 
													 $_SESSION["nivel"] = $resv["Nivel"];
													 $_SESSION["cod"] = $resv["Cod"];
													 $_SESSION["nome"] = $resv["Nome"];
													 $_SESSION["login"] = $resv["Login"];
													 header("Location:indexadmin.php");
												 }
												
												$_REQUEST["login"]="";
												$_REQUEST["senha"]="";
												
											
									        }
		
	}
	
	
	
	?>
									<fieldset class="boxBody">
									  <label>Login</label>
									  <input type="text" tabindex="1" name="login" placeholder="Login" required>
									  <label><a href="#" class="rLink" tabindex="5">Esqueceu sua Senha?</a>Senha</label>
									  <input type="password" tabindex="2" name="senha" placeholder="Senha" required>
									  
									</fieldset>
									<footer >
									
									  <label><a href="Cadastro_Cli_SF.php" class="rLink" tabindex="5">Cadastrar</a></label>
									  <input type="submit" name="akicaramba" class="btnLogin" value="Login" tabindex="4">
									</footer>
								</form>
							  </ul>
						                   
				    </li>					                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            
				<br>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Cadastro de Clientes</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Cadastro_Cli_SF.php">
						
							
						
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">CPF</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="cli_cpf" placeholder="CPF" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_nome" placeholder="Nome" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="email1">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email1" name="cli_email" placeholder="Email" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="username1">Login</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username1" name="cli_login" placeholder="Login" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="cli_senha" placeholder="Senha" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Confirmar Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="cli_conf_senha" placeholder="Confirmar Senha" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Endereco</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_end" placeholder="Endereco" />
								</div>
							</div>
							
							<input type="hidden" name="cli_nivel" value="Cliente" />
							
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Cadastrar</button>
									<a class="btn btn-primary" href="index.php">Voltar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			
        </div>
    </header>

     <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    
					
				
						<h3 class="panel-title">Cadastro de Clientes</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="Cadastro_Cli_SF.php">
						
							
						
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">CPF</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="cli_cpf" placeholder="CPF" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Nome</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_nome" placeholder="Nome" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="email1">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email1" name="cli_email" placeholder="Email" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="username1">Login</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username1" name="cli_login" placeholder="Login" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="cli_senha" placeholder="Senha" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Confirmar Senha</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="cli_conf_senha" placeholder="Confirmar Senha" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Endereco</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="cli_end" placeholder="Endereco" />
								</div>
							</div>
							
							<input type="hidden" name="cli_nivel" value="Cliente" />
							
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Cadastrar</button>
									<a class="btn btn-primary" href="index.php">Voltar</a>
								</div>
							</div>
						</form>
					</div>
		
					
					
					
                </div>
            </div>
        </div>
    </section>
  

    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>

</body>

</html>
