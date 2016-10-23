<?php
if (isset($_REQUEST["signup1"])){
										
										if ($_REQUEST["func_nome"]=="" or $_REQUEST["func_login"]=="" or $_REQUEST["func_senha"]=="" or $_REQUEST["func_conf_senha"]=="") {
											echo "<h2 style='color: red'>Campos obrigatórios em branco</h2>";
										} else {
												
												$sqli = "insert into funcionario 
												(Func_Nome, Func_Login, Func_Senha, Func_Nivel)
												values ('".$_REQUEST["func_nome"]."','".$_REQUEST["func_login"]."',
												'".$_REQUEST["func_senha"]."','".$_REQUEST["func_nivel"]."')";
												mysql_query($sqli,$con);
												
												
												$_REQUEST["func_nome"]="";
												$_REQUEST["func_login"]="";
												$_REQUEST["func_senha"]="";
												$_REQUEST["func_conf_senha"]="";
												header("Location:indexadmin.php");
											
										}
										
										
									}
?>