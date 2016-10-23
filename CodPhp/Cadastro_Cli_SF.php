<?php

include "Conexao.php";
?>
<?php
   if(isset($_REQUEST['signup1'])) 
	{
	if($_REQUEST['cli_cpf'] == "" or $_REQUEST['cli_nome'] =="" or $_REQUEST['cli_email']=="" or $_REQUEST['cli_login']==""
		 or $_REQUEST['cli_senha']=="" or $_REQUEST['cli_end']=="" or $_REQUEST['cli_conf_senha'] =="") {
			echo "<h3 style='color:red'>Campo em branco ! Preencha todos os campos obrigatórios </h3>";
			
		} else {
			$sql = "select *
			from cliente	
			where Cli_CPF='".$_REQUEST['cli_cpf']."' ";
			$qry = mysql_query($sql, $con)
			or die("Falha na consulta ao banco");
		
			if(mysql_num_rows($qry) > 0) {
				echo "<h3 style='color: red'> Este dado já existe! </h3>";
				
			} else {
				if($_REQUEST['cli_senha'] == $_REQUEST['cli_conf_senha']){ 
				$sql = "insert into cliente
				(Cli_Nome, Cli_CPF, Cli_Endereco, Cli_Email, Cli_Login, Cli_Senha, Cli_Nivel) 
				values ('".$_REQUEST['cli_nome']."','".$_REQUEST['cli_cpf']."','".$_REQUEST['cli_end']."',
		'".$_REQUEST['cli_email']."','".$_REQUEST['cli_login']."','".$_REQUEST['cli_senha']."','Cliente')";

				$qry = mysql_query($sql, $con);
				echo "<h2 style='color:green'>
				Cadastro realizado! </h2>";
				$_REQUEST["cli_nome"]="";
				$_REQUEST["cli_cpf"]="";
				$_REQUEST["cli_end"]="";
				$_REQUEST["cli_email"]="";
				$_REQUEST["cli_login"]="";
				$_REQUEST["cli_senha"]="";
				header("Location:index.php");
				}else{
					echo "<h2 style='color:red'>A senha não é a mesma, tente outra vez!</h2>";
				}
				
			}

		}
	}
//-----------------------------------------------------------------------------------------------

 ?>