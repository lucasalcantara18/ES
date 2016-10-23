<?php
	
   if (isset($_REQUEST["voltarcli"])){
	
	
	 header("Location:indexcli.php");
	
    }
		
	if (isset($_REQUEST["cancelarcli"])){
	
	
	 header("Location:indexcli.php");
	
    }

	if (isset($_REQUEST["voltarfunc"])){
		
	
	
	 header("Location:indexadmin.php");
	
    }
		
	if (isset($_REQUEST["cancelarfunc"])){
	
	
	 header("Location:indexadmin.php");
	
    }

	if (isset($_REQUEST["voltarprod"])){
		 
		
      if($_SESSION['nivel'] == "Administrador"){
		header("Location:indexadmin.php");
	
	  }else if($_SESSION['nivel'] == "Funcionario"){
		header("Location:indexfunc.php");
	 
      }
	
	 
	
    }
		
	if (isset($_REQUEST["cancelarprod"])){
	
	 if($_SESSION['nivel'] == "Administrador"){
		header("Location:indexadmin.php");
	
	 }else if($_SESSION['nivel'] == "Funcionario"){
		header("Location:indexfunc.php");
	 
     }
	}
?>