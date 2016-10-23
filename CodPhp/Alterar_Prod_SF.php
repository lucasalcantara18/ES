<?php
include "Conexao.php";
?>


        <?php
		        
				if (!isset($_REQUEST["prod_nome"])) $_REQUEST["prod_nome"]="";
				if (!isset($_REQUEST["prod_tipo"])) $_REQUEST["prod_tipo"]="";
				if (!isset($_REQUEST["prod_status"])) $_REQUEST["prod_status"]="";
				if (!isset($_REQUEST["prod_receita"])) $_REQUEST["prod_receita"]="";	
				if (!isset($_REQUEST["prod_descricao"])) $_REQUEST["prod_descricao"]="";	
				if (!isset($_REQUEST["prod_fabri"])) $_REQUEST["prod_fabri"]="";	
				if (!isset($_REQUEST["prod_validade"])) $_REQUEST["prod_validade"]="";	
				if (!isset($_REQUEST["prod_gramat"])) $_REQUEST["prod_gramat"]="";	
				if (!isset($_REQUEST["prod_cod_func"])) $_REQUEST["prod_cod_func"]="";	
            
            if (isset($_REQUEST["pesquisar"])) {
 
                if ($_REQUEST["prod_cod"] == "") {
                    echo "<h2 style='color: red'>Digite o codigo do Produto</h2>";
                } else {
                    $cod = $_REQUEST["prod_cod"];
                 
                    $sqlv = "select Prod_Nome, Prod_Tipo, Prod_Status, Prod_Receita, Prod_Descricao, Prod_Fabricante, Prod_Validade, Prod_Gramatura, Func_CodFuncionario from produtos 
            where Prod_CodProduto ='".trim($_REQUEST["prod_cod"])."'";

                    $qryv = mysql_query($sqlv, $con) or die ("Erro");
                    $resv = mysql_fetch_array($qryv);
					

                    if (count($resv) == 0) {
                        echo "<h2 style='color: red'> Não existe este Produto ! </h2>";
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
			
     	?>
     	<?php
            if (isset($_REQUEST["signup1"])) {
				
				 

                if ($_REQUEST["prod_nome"] == "" or $_REQUEST["prod_tipo"] == "" or $_REQUEST["prod_status"] == "" or $_REQUEST["prod_receita"] == "" or $_REQUEST["prod_descricao"] == "" or $_REQUEST["prod_fabri"] == ""  or $_REQUEST["prod_validade"] == "" or $_REQUEST["prod_gramat"] == "") {
                    echo "<h2 style='color: red'>Campo(s) em branco ! Por favor, preencha todos os campos obrigatórios</h2>";
                } else {
                    $red = $_SESSION["nivel"];
                  echo  $sqli = "update produtos
			     set
				Prod_Nome ='" . $_REQUEST["prod_nome"] . "', 
				Prod_Tipo ='" . $_REQUEST["prod_tipo"] . "',
				Prod_Status ='" . $_REQUEST["prod_status"] . "', 
				Prod_Receita ='" . $_REQUEST["prod_receita"] . "',
				Prod_Descricao ='" . $_REQUEST["prod_descricao"] . "', 
				Prod_Fabricante ='" . $_REQUEST["prod_fabri"] . "',
				Prod_Validade ='" . $_REQUEST["prod_validade"] . "',
				Prod_Gramatura ='" . $_REQUEST["prod_gramat"] . "',
				Func_CodFuncionario ='" . $_REQUEST["prod_cod_func"] . "'
			     where Prod_CodProduto = '" . $_REQUEST["prod_codd"] . "'";
                   
                    mysql_query($sqli, $con);
                    
                   		$_REQUEST["prod_nome"] = "";
                        $_REQUEST["prod_tipo"] = "";
                        $_REQUEST["prod_status"] = "";
						$_REQUEST["prod_receita"] = "";                        
                        $_REQUEST["prod_descricao"] = "";
                        $_REQUEST["prod_fabri"] = "";
                        $_REQUEST["prod_validade"] = "";
                        $_REQUEST["prod_gramat"] = "";
						$_REQUEST["prod_cod_func"] = "";
						if($red == "Funcionario"){
								header("Location:indexfunc.php");
						}else if($red == "Administrador"){
								header("Location:indexadmin.php");
						}
                }
            }
            ?>	

   
   