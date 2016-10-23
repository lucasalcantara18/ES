<?php
 session_start();

?>


	<?php
	include "Conexao.php";
	
	if (isset($_REQUEST["btnLogin"])){
		echo "kika";
		
									if ($_REQUEST["login"]=="" or $_REQUEST["senha"]=="" ) {
											echo "<h2 style='color: red'>Campos obrigatórios em branco</h2>";
									} else {
												
																						
												echo $sqli = "select c.Cli_CPF as Cod, c.Cli_Login as Login, c.Cli_Senha as Senha, c.Cli_Nome as Nome, c.Cli_Nivel as Nivel  
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
													 echo
													 header("Location:Cadastro_Cli_SF.php");
													 
												 }else if ($resv["Nivel"] == "Funcionario"){
													  
													   
													 $_SESSION["nivel"] = $resv["Nivel"];
													 $_SESSION["cod"] = $resv["Cod"];
													 $_SESSION["nome"] = $resv["Nome"];
													 $_SESSION["login"] = $resv["Login"];
													 header("Location:Cadastro_Prod_SF.php");
												 }else if ($resv["Nivel"] == "Administrador"){
													 
													 $_SESSION["nivel"] = $resv["Nivel"];
													 $_SESSION["cod"] = $resv["Cod"];
													 $_SESSION["nome"] = $resv["Nome"];
													 $_SESSION["login"] = $resv["Login"];
													 header("Location:Cadastro_Func_SF.php");
												 }
												
												$_REQUEST["login"]="";
												$_REQUEST["senha"]="";
												
											
									        }
		
	}
	
	
	
	?>

