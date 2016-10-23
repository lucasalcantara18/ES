<?php

include "Conexao.php";
?>



			



             <?php // Busca Cliente
                
			    if (!isset($_REQUEST["prod_nome"])) $_REQUEST["prod_nome"]="";
				if (!isset($_REQUEST["prod_tipo"])) $_REQUEST["prod_tipo"]="";
				if (!isset($_REQUEST["prod_status"])) $_REQUEST["prod_status"]="";
				if (!isset($_REQUEST["prod_receita"])) $_REQUEST["prod_receita"]="";	
				if (!isset($_REQUEST["prod_descricao"])) $_REQUEST["prod_descricao"]="";	
				if (!isset($_REQUEST["prod_fabri"])) $_REQUEST["prod_fabri"]="";	
				if (!isset($_REQUEST["prod_validade"])) $_REQUEST["prod_validade"]="";	
				if (!isset($_REQUEST["prod_gramat"])) $_REQUEST["prod_gramat"]="";
                if (!isset($_REQUEST["prod_cod_func"])) $_REQUEST["prod_cod_func"]="";				
				if (!isset($_REQUEST["prod_est_qtd"])) $_REQUEST["prod_est_qtd"]="";
				if (!isset($_REQUEST["prod_est_data"])) $_REQUEST["prod_est_data"]="2016-10-28 13:18:29";
			
            if (isset($_REQUEST["pesquisar"])) {
                if ($_REQUEST["prod_cod"] == "") {
                    echo "<h2 style='color: red'> Digite o código do Produto! </h2>";
                } else {
					
					 $sqlt = "SELECT count(*) as qtd FROM estoque WHERE Est_Produtos_CodProduto='" . trim($_REQUEST["prod_cod"]) . "'";
					 $qryy = mysql_query($sqlt, $con) or die ("Erro");
					 $resy = mysql_fetch_array($qryy);
					 echo $resy['qtd'];
					if($resy['qtd'] > 0){
						
											$cod = $_REQUEST["prod_cod"];
									$sqlv = "select distinct Prod_Nome, Prod_Tipo, Prod_Status, Prod_Receita, Prod_Descricao, Prod_Fabricante, Prod_Validade, Prod_Gramatura, Func_CodFuncionario, Est_QuantEstoque, Est_Data_Hora from produtos, estoque  
							where Prod_CodProduto =	Est_Produtos_CodProduto and Prod_CodProduto='" . trim($_REQUEST["prod_cod"]) . "'";

									$qryv = mysql_query($sqlv, $con) or die ("Erro");
									$resv = mysql_fetch_array($qryv);

									if (count($resv) == 0) {
										echo "<h2 style='color: red'> Este Produto não está Cadastrado! </h2>";
									} else {
										$_REQUEST["prod_codd"] = $cod;
										$_REQUEST["prod_nome"] = $resv["Prod_Nome"];
										$_REQUEST["prod_tipo"] = $resv["Prod_Tipo"];
										$_REQUEST["prod_status"] = $resv["Prod_Status"];
										$_REQUEST["prod_receita"] = $resv["Prod_Receita"];                        
										$_REQUEST["prod_descricao"] = $resv["Prod_Descricao"];
										$_REQUEST["prod_fabri"] = $resv["Prod_Fabricante"];
										$_REQUEST["prod_validade"] = $resv["Prod_Validade"];
										$_REQUEST["prod_gramat"] = $resv["Prod_Gramatura"];
										$_REQUEST["prod_cod_func"] = $resv["Func_CodFuncionario"];
										$_REQUEST["prod_est_qtd"] = $resv["Est_QuantEstoque"];
										$_SESSION['qtd'] = $resv["Est_QuantEstoque"];
										$_REQUEST["prod_est_data"] = $resv["Est_Data_Hora"];
										
									}
										
						
					}else{
						
						          	$cod = $_REQUEST["prod_cod"];
									$sqlv = "select distinct Prod_Nome, Prod_Tipo, Prod_Status, Prod_Receita, Prod_Descricao, Prod_Fabricante, Prod_Validade, Prod_Gramatura, Func_CodFuncionario from produtos  
							                 where Prod_CodProduto='" . trim($_REQUEST["prod_cod"]) . "'";

									$qryv = mysql_query($sqlv, $con) or die ("Erro");
									$resv = mysql_fetch_array($qryv);

									if (count($resv) == 0) {
										echo "<h2 style='color: red'> Este Produto não está Cadastrado! </h2>";
									} else {
										$_REQUEST["prod_codd"] = $cod;
										$_REQUEST["prod_nome"] = $resv["Prod_Nome"];
										$_REQUEST["prod_tipo"] = $resv["Prod_Tipo"];
										$_REQUEST["prod_status"] = $resv["Prod_Status"];
										$_REQUEST["prod_receita"] = $resv["Prod_Receita"];                        
										$_REQUEST["prod_descricao"] = $resv["Prod_Descricao"];
										$_REQUEST["prod_fabri"] = $resv["Prod_Fabricante"];
										$_REQUEST["prod_validade"] = $resv["Prod_Validade"];
										$_REQUEST["prod_gramat"] = $resv["Prod_Gramatura"];
										$_REQUEST["prod_cod_func"] = $resv["Func_CodFuncionario"];
									
									}
										
						
						
					}
					
					
                
                }
            }
            
            ?> 

            <?php // Atualizar estoque
            if (isset($_REQUEST["signup1"])) {

							
               if($_REQUEST["prod_nome"] == "" or $_REQUEST["prod_tipo"] == "" or $_REQUEST["prod_status"] == "" or $_REQUEST["prod_receita"] == "" or $_REQUEST["prod_descricao"] == "" or $_REQUEST["prod_fabri"] == ""  or $_REQUEST["prod_validade"] == "" or $_REQUEST["prod_gramat"] == "" or $_REQUEST["prod_est_qtd"] == "") {
				
			
			} else {
				
				     $sqlt = "SELECT count(*) as qtd FROM estoque WHERE Est_Produtos_CodProduto='" . trim($_REQUEST["prod_codd"]) . "'";
					 $qryy = mysql_query($sqlt, $con) or die ("Erro");
					 $resy = mysql_fetch_array($qryy);
					 if($resy['qtd'] > 0){
						 $nqtd = $_SESSION['qtd'] + $_REQUEST['prod_est_qtd'];
						  echo $sqli = "update estoque
							 set
							 Est_QuantEstoque= '" . $nqtd . "',
				             Est_Produtos_CodProduto='" . $_REQUEST["prod_codd"] . "',
				             Est_Data_Hora='" . $_REQUEST["prod_est_data"] . "' 
			     
							where Est_Produtos_CodProduto = '" . $_REQUEST["prod_codd"] . "'";
                  
                    mysql_query($sqli, $con);
                    echo "<h2 style='color: green'>Produto Excluído com Sucesso!</h2>";
                    	$_REQUEST["prod_nome"] = "";
                        $_REQUEST["prod_tipo"] = "";
                        $_REQUEST["prod_status"] = "";
						$_REQUEST["prod_receita"] = "";                        
                        $_REQUEST["prod_descricao"] = "";
                        $_REQUEST["prod_fabri"] = "";
                        $_REQUEST["prod_validade"] = "";
                        $_REQUEST["prod_gramat"] = "";
						$_REQUEST["prod_cod_func"] = "";
						$_REQUEST["prod_est_qtd"] = "";
						$_REQUEST["prod_est_data"] = "";
						unset($_SESSION['qtd']);
						//if($red == "Funcionario"){
							header("Location:testee.php");
						//}else if($red == "Administrador"){
							//	header("Location:indexadmin.php");
						//}
					 }else{
						 
						  echo $sqli = "INSERT INTO estoque
						               (Est_QuantEstoque, Est_Produtos_CodProduto, Est_Data_Hora) 
							    VALUES ('".$_REQUEST["prod_est_qtd"]."','".$_REQUEST["prod_codd"]."','".$_REQUEST["prod_est_data"]."')";
						  
						  
						  
						  
						 
                  
                    mysql_query($sqli, $con);
                    echo "<h2 style='color: green'>Produto Excluído com Sucesso!</h2>";
                    	$_REQUEST["prod_nome"] = "";
                        $_REQUEST["prod_tipo"] = "";
                        $_REQUEST["prod_status"] = "";
						$_REQUEST["prod_receita"] = "";                        
                        $_REQUEST["prod_descricao"] = "";
                        $_REQUEST["prod_fabri"] = "";
                        $_REQUEST["prod_validade"] = "";
                        $_REQUEST["prod_gramat"] = "";
						$_REQUEST["prod_cod_func"] = "";
						$_REQUEST["prod_est_qtd"] = "";
						$_REQUEST["prod_est_data"] = "";
						unset($_SESSION['qtd']);
						//if($red == "Funcionario"){
						header("Location:testee.php");
						//}else if($red == "Administrador"){
							//	header("Location:indexadmin.php");
						//}
						 
						 
					 }
				
					
					
				
                    //$red = $_SESSION["nivel"];
                   
                }
            }
        ?>