<?php  include "Conexao.php"; ?>
<DOCTYPE html>
<html lang="pt-br">
<head>
<title> Controle de Estoque </title>
	<meta charset="UTF-8"/>
</head>
<body>
<form method='POST' action='Controle_Estoque.php'>
Informe o Nome do Produto:
 <input type = 'text' name = 'nome_prod' value = '<?php echo $_REQUEST["nome_prod"] ?>' />
 <input type = 'submit' name = 'pesquisar' value = "Pesquisar"/><br>

<?php
// Buscar Produto por nome
	if (isset($_REQUEST["pesquisar"])) {
		 if ($_REQUEST["nome_prod"] == "") {
                    echo "<h2 style='color: red'>Digite o nome do Produto </h2>";
                } else {
            
                    $sqlv = "select * from produtos 
           			where nome_prod ='" . $_REQUEST["Prod_Nome"] . "'";
           			$con = $mysqli->query($sqlv)  or die ($mysqli->error);                

                }

	}
?>


</form>

<table>
	<tr>
		<td> Código Produto</td>
		<td> Nome Produto</td>
		<td> Tipo Produto</td>
		<td> Status Produto</td>
		<td> Receita Produto</td>
		<td> Descrição Produto</td>
		<td> Fabricante Produto</td>
		<td> Validade Produto</td>
		<td> Gramatura Produto</td>
		<td> Código Func Produto</td>

	</tr>
	<?php while ($dado = $con->mysql_fetch_array()){ ?> 
	<tr>
		<td> <?php echo $dado["Prod_CodProduto"];  ?></td>
		<td> <?php echo $dado["Prod_Nome"];  ?></td>
		<td> <?php echo $dado["Prod_Tipo"];  ?></td>
		<td> <?php echo $dado["Prod_Status"];  ?></td>
		<td> <?php echo $dado["Prod_Receita"];  ?></td>
		<td> <?php echo $dado["Prod_Descrição"];  ?></td>
		<td> <?php echo $dado["Prod_Fabricante"];  ?></td>
		<td> <?php echo $dado["Prod_Validade"];  ?></td>
		<td> <?php echo $dado["Prod_Gramatura"];  ?></td>
		<td> <?php echo $dado["	Func_CodFuncionario"];  ?></td>
	</tr>
	<?php } ?>
</table>

</body>



</html>