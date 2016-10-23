<?php
include "Conexao.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Panel table with filters (per column) - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.form.js"></script>
	
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
		jQuery('#meuform').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				target: '.modal-body',
				data: dados,
				success: function( data )
				{
					//alert( data );
					alert($(".btneditt").val());
					$("#meuform").resetForm();
				}
			});
			
			return false;
		});
	});
	</script>
	
	
</head>
<body>
<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Produtos</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                </div>
            </div>
			<form action="testee.php" method="post" id="meuform">
            <table class="table">
			 
			  
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tipo" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Status" disabled></th>
						<th><input type="text" class="form-control" placeholder="Receita" disabled></th>
						<th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
						<th><input type="text" class="form-control" placeholder="Fabricante" disabled></th>
						<th><input type="text" class="form-control" placeholder="Validade" disabled></th>
						<th><input type="text" class="form-control" placeholder="Gramatura" disabled></th>
						<th><input type="text" class="form-control" placeholder="Quantidade" disabled></th>
						<th>Editar</th>
						<th>Excluir</th>
						
                    </tr>
                </thead>
                <tbody>
					<?php
								
								
 								$sqlv = "SELECT p.Prod_CodProduto as cod, p.Prod_Nome as nome, p.Prod_Tipo as tipo, 
								                p.Prod_Status as status, p.Prod_Receita as receita, p.Prod_Descricao as descricao, 
												p.Prod_Fabricante as fabricante, p.Prod_Validade as validade, p.Prod_Gramatura as gramatura, 
												e.Est_QuantEstoque as estoque 
                                         FROM produtos p, estoque e 
                                         WHERE p.Prod_CodProduto = e.Est_Produtos_CodProduto
										 order by p.Prod_CodProduto asc";

								$qryv = mysql_query($sqlv, $con) or die ("Erro");
								$aux = "1";
								
								while($resv = mysql_fetch_array($qryv)){
									echo "<tr>";
									echo    "<td>";
									echo      $resv['cod'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['nome'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['tipo'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['status'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['receita'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['descricao'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['fabricante'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['validade'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['gramatura'];
									echo    "</td>";
									echo    "<td>";
									echo      $resv['estoque'];
									echo    "</td>";
									echo    "<td>";
									echo    $edit = "<p data-placement="."top"." data-toggle="."tooltip"." title=".$resv['cod']."><button class='btn btn-primary btn-xs' data-title='Edit' id='' name='btneditt' value=".$resv['cod']." data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button></p>";
									echo    "</td>";
									echo    "<td>";
									echo    $dell = "<p data-placement="."top"." data-toggle="."tooltip"." title="."Deletar"."><button class='btn btn-primary btn-xs' data-title='Delete' id='btn'  name='btndelet' value=".$resv['cod']." data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p>";
									echo    "</td>";
									echo "</tr>";
									
									
								}
				
				
				
				
					?>
                   
                </tbody>
				
            </table>
			</form>
		<div class="clearfix"></div>
		
				
				<ul class="pagination pull-right">
				
				  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
				  <li class="active"><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
				 
				</ul>
							
			
			
			
        </div>
		 <a class="btn btn-primary" href="Cadastro_Prod_Est_SF.php">Incluir</a>
    </div>

</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
			<?php
			
			  if(!isset($_REQUEST['btnedit'])){
				   echo "<pre>";
				   print_r($_REQUEST);
				   echo "</pre>";				   
			  }else{
				  
			  }
			  
			  
			?>
		  
		  
		  
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg"  style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	
		
		
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <?php
			
			  if (!isset($_REQUEST["btndelet"])){
				   echo "<pre>";
				   print_r($_REQUEST);
				   echo "</pre>";		  
			  }
			  
			   //if (isset($_REQUEST["btnatt"])) {
				//echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=testee.php'>";
			  
			  //}
			?>
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


<script type="text/javascript">
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

	//$( "#btn" ).click(function() {
        
     //});
	
    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>
</body>
</html>
