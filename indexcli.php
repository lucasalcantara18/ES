<?php
 @session_start();
 
  $cont = 0;
 //$_SESSION["nivel"] = $_SESSION["nivel"];
 //$_SESSION["cod"] =  $_SESSION["cod"];
 //$_SESSION["nome"] = $_SESSION["nome"];
 //$_SESSION["login"] = $_SESSION["login"];

 //print_r($_SESSION);
 
 
 
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
                          <a class="page-scroll" > <?php echo $_SESSION['nome']; echo ", "; echo $_SESSION['nivel'];   ?> </a>
                    </li>		
				
                    <li>
                        <a class="page-scroll" href="indexcli.php">Home</a>
                    </li>					                   					
                   
					<li id="dLabelt">
                        <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								Cliente
								<b class="caret"></b>
							  </a>
						<ul class="dropdown-menu" id="tdmm" role="menu" aria-labelledby="dLabel">
								<li id="altc">
								<a  href="Alterar_Cli_SF.php" >Alterar Dados Cadastrais</a> 
								</li> 
								<li id="excc">
								<a  href="Excluir_Cli_SF.php" >Excluir Conta</a> 
							    </li> 
								
						
						</ul>
						
					
                    </li> 
					
					
					<li>
                        <a class="page-scroll" href="#contact">Pedidos</a>
                    </li>
					
					 <li>
                        <a  class="page-scroll" href="#loja">Sobre</a> 
                    </li> 
					
					
					<li>
                        <a class="page-scroll" href="#loja">Contato</a>
                    </li>
					
					
					
					
					<li id="tli">
					  
					   <a class="dropdown-toggle" id="dblLabel" role="button" data-toggle="dropdown" onclick="teste.php" data-target="#" href="/page.html">	 
							 Logout												
								<b class="caret"></b>								
							  </a>
							  
							  <ul class="dropdown-menu" role="menu" id="tdm" aria-labelledby="dLabell" >
								<li id="tform">
									<form  method="post" class=""  action="index.php">
										<button type="submit" class="btn btn-secondary" name="loggout" id="btncss" >Logout</button>
										<?php
											if (isset($_REQUEST["loggout"])){
													include "logout.php";
											}
								        ?>
									</form>
								</li> 																					
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
            <div class="header-content-inner">
                <h1 id="homeHeading">Drogavas</h1>
                <hr>
                <p>Presente onde você estiver</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll" >Visite nossas seções</a>
            </div>
        </div>
    </header>

    
  <section class="bg-primary" id="loja">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
					
					<p>Todas as regras e promoções são válidas apenas para produtos vendidos e entregues pela Americanas.com. O preço válido será o da finalização da compra.
B2W - Companhia Digital / CNPJ: 00.776.574/0006-60 / Inscrição Estadual: 492.513.778.117 Endereço: Rua Sacadura Cabral, 102 - Rio de Janeiro, RJ - 20081-902
Atendimento ao cliente: atendimento.acom@americanas.com
</p>
				<p> </p>
				<p> </p>
				<p> A melhor loja. Os menores preços. </p>
				
				
						
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
