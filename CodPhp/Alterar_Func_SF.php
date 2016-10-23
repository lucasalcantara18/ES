<?php
include "Conexao.php";
?>



<?php


	            if (!isset($_REQUEST["func_nome"])) $_REQUEST["func_nome"]="";
				if (!isset($_REQUEST["func_login"])) $_REQUEST["func_login"]="";
				if (!isset($_REQUEST["func_senha"])) $_REQUEST["func_senha"]="";
				if (!isset($_REQUEST["func_conf_senha"])) $_REQUEST["func_conf_senha"]="";	
				

if (isset($_REQUEST["pesquisar"])) {

                if ($_REQUEST["func_cod"] == "") {
                    echo "<h2 style='color: red'>Digite o codigo do Funcionario</h2>";
                } else {
                    $cod = $_REQUEST["func_cod"];
                
                    $sqlv = "select distinct Func_Nome, Func_Login,Func_Senha from funcionario 
            where Func_CodFuncionario='" . $_REQUEST["func_cod"] . "'";

                    $qryv = mysql_query($sqlv, $con);
                    $resv = mysql_fetch_array($qryv);
					
                    if (count($resv) == 0) {
                        echo "<h2 style='color: red'>Nao existe este Funcionario</h2>";
                    } else {
						
						
                        $_REQUEST["func_codd"] = $cod;
                        $_REQUEST["func_nome"] = $resv["Func_Nome"];
                        
                        $_REQUEST["func_login"] = $resv["Func_Login"];
                        $_REQUEST["func_senha"] = $resv["Func_Senha"];
                        $_REQUEST["func_conf_senha"] = $resv["Func_Senha"];
                    }
                }
            }
            


?>

<?php
            if (isset($_REQUEST["signup1"])) {

                if ($_REQUEST["func_nome"] == "" or $_REQUEST["func_login"] == "") {
                    echo "<h2 style='color: red'>Campos obrigat�rios em branco</h2>";
                } else {
                    
                   $sqli = "update funcionario 
			     set
				Func_Nome ='" . $_REQUEST["func_nome"] . "', 
				Func_Login ='" . $_REQUEST["func_login"] . "',
				Func_Senha ='" . $_REQUEST["func_senha"] . "'
			     where Func_CodFuncionario = '" . $_REQUEST["func_codd"] . "'";
                   
                    mysql_query($sqli, $con);
                    echo "<h2 style='color: green'>Cadastro Realizado</h2>";
                    $_REQUEST["func_nome"] = "";
                    $_REQUEST["func_login"] = "";
                    $_REQUEST["func_senha"] = "";
                    $_REQUEST["func_conf_senha"] = "";
					header("Location:indexadmin.php");
                }
            }
            ?>			