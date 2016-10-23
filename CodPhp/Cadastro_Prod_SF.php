<?php
include "Conexao.php";
?>

<?php
				
				
				if (isset($_REQUEST["signup1"])){
					
					if ($_REQUEST["prod_nome"]=="" or $_REQUEST["prod_tipo"]=="" or $_REQUEST["prod_status"]==""  or $_REQUEST["prod_descricao"]=="" or $_REQUEST["prod_fabri"]=="" or $_REQUEST["prod_validade"]=="" or $_REQUEST["prod_gramat"]=="") {
						echo "<h2 style='color: red'>Campos obrigatórios em branco</h2>";
					} else {
						    $red = $_SESSION["nivel"];
							$sqli = "insert into produtos 
							(Prod_Nome, Prod_Tipo, Prod_Status, Prod_Receita,Prod_Descricao, Prod_Fabricante, Prod_Validade, Prod_Gramatura,Func_CodFuncionario)
							values ('".$_REQUEST["prod_nome"]."',
							'".$_REQUEST["prod_tipo"]."',
							'".$_REQUEST["prod_status"]."',
							'".$_REQUEST["prod_receita"]."',
							'".$_REQUEST["prod_descricao"]."',
							'".$_REQUEST["prod_fabri"]."',
							'".$_REQUEST["prod_validade"]."',
							'".$_REQUEST["prod_gramat"]."',
							'".$_REQUEST["prod_cod_func"]."')";
							mysql_query($sqli,$con);
							echo "<h2 style='color: green'>Cadastro Realizado</h2>";
							$_REQUEST["prod_nome"]="";
							$_REQUEST["prod_tipo"]="";
							$_REQUEST["prod_status"]="";
							$_REQUEST["prod_receita"]="";
							$_REQUEST["prod_descricao"]="";
							$_REQUEST["prod_fabri"]="";
							$_REQUEST["prod_validade"]="";
							$_REQUEST["prod_gramat"]="";
							if($red == "Funcionario"){
								header("Location:indexfunc.php");
							}else if($red == "Administrador"){
								header("Location:indexadmin.php");
							}
							
							
							
					}
					
					
				}
					
				
				
	?>			