<?php
include "Conexao.php";
?>
<?php // Busca Cliente 1111111111
			    
		        if (!isset($_REQUEST["cli_cpf"])) $_REQUEST["cli_cpf"]="";
				if (!isset($_REQUEST["cli_nome"])) $_REQUEST["cli_nome"]="";
				if (!isset($_REQUEST["cli_end"])) $_REQUEST["cli_end"]="";
				if (!isset($_REQUEST["cli_email"])) $_REQUEST["cli_email"]="";	
				if (!isset($_REQUEST["cli_login"])) $_REQUEST["cli_login"]="";	
				if (!isset($_REQUEST["cli_senha"])) $_REQUEST["cli_senha"]="";	
				if (!isset($_REQUEST["cli_conf_senha"])) $_REQUEST["cli_conf_senha"]="";	
				

            
           
         
           
                    $cod = $_SESSION["cod"];
                    $sqlv = "select distinct Cli_Nome, Cli_Endereco, Cli_Email, Cli_Login, Cli_Senha from cliente 
            where Cli_CPF ='" . $_SESSION["cod"] . "'";
					
                    $qryv = mysql_query($sqlv, $con);
                    $resv = mysql_fetch_array($qryv);
	                
                    if (count($resv) == 0) {
                        echo "<h2 style='color: red'>Este Cliente n�o est� Cadastrado! </h2>";
                    } else {
						
						$_REQUEST["cli_codd"] = $cod;
                        $_REQUEST["cli_cpf"] = $cod;
                        $_REQUEST["cli_nome"] = $resv["Cli_Nome"];
                        $_REQUEST["cli_end"] = $resv["Cli_Endereco"];
                        $_REQUEST["cli_email"] = $resv["Cli_Email"];
                        $_REQUEST["cli_login"] = $resv["Cli_Login"];
                        $_REQUEST["cli_senha"] = $resv["Cli_Senha"];
                        $_REQUEST["cli_conf_senha"] = $resv["Cli_Senha"];
                    }
               
            
            
            ?>


            <?php // Exclui Cliente
            if (isset($_REQUEST["signup1"])) {

               if($_REQUEST['cli_nome'] == "" or $_REQUEST['cli_cpf'] =="" or $_REQUEST['cli_end']=="" or $_REQUEST['cli_email']=="" or $_REQUEST['cli_login']=="") {
				echo "<h3 style='color:red'>Campo(s) em branco ! Preencha todos os campos obrigat�rios </h3>";
			
			} else {
                    
                    $sqli = "delete from cliente 
			     
							where Cli_CPF = '" . $_REQUEST["cli_codd"] . "'";
                  
                    mysql_query($sqli, $con);
                    echo "<h2 style='color: green'>Conta Excluida com Sucesso!</h2>";
                    $_REQUEST["cli_nome"]="";
					$_REQUEST["cli_cpf"]="";
					$_REQUEST["cli_end"]="";
					$_REQUEST["cli_email"]="";
					$_REQUEST["cli_login"]="";
					$_REQUEST["cli_senha"]="";
					header("Location:index.php");
                }
            }
            ?>				