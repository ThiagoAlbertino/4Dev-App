<?php
	session_start();

	if(!isset($_SESSION['username_funcionario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDB = new db();
    $link = $objDB->conecta_mysql();

	$id_funcionario = $_SESSION['id_funcionario'];
?>	
<!DOCTYPE html>
<html lang="pt-br">
	<meta charset="utf-8">
	<head>
		<title>4Dev App</title>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script type="text/javascript">
			function listar(){
			    var i = document.form.opcoes.selectedIndex;
			    if(form.opcoes[i].text == 'Todos as avaliações'){
 					function lista_clientes(){
						$.ajax({
							url: 'listar_clientes_do_banco.php',
							success: function(data){
								$('#lista').html(data);
							}
						});
					}
					lista_clientes();
			    }	

			    if(form.opcoes[i].text == 'Nota de Avaliação Crescente'){
 					function lista_clientes(){
						$.ajax({
							url: 'listar_clientes_do_banco_2.php',
							success: function(data){
								$('#lista').html(data);
							}
						});
					}
					lista_clientes();
			    }	

				if(form.opcoes[i].text == 'Nota de Avaliação Decrescente'){
 					function lista_clientes(){
						$.ajax({
							url: 'listar_clientes_do_banco_3.php',
							success: function(data){
								$('#lista').html(data);
							}
						});
					}
					lista_clientes();
			    }	
			}
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-static-top">
	      	<div class="container">
	        	<div class="navbar-header">
	          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
	          		</button>
	          		<a href="index.php">
	          			<img src="images/4L.png" />
	        		</a>
	        	</div>
	        	<div id="navbar" class="navbar-collapse collapse">
	          		<ul class="nav navbar-nav navbar-right">
	            		<li><a href="#" value="Voltar" onclick="window.close()">Voltar</a></li>
	          		</ul>
	        	</div>
	      	</div>
	    </nav>
	    <div class="container">
	      	<div class="col-md-3">
	     		<div>
	     			<form name="form"> 
				      	<label>Filtrar por:</label>
				      	<select id="opcoes" onchange="listar()">
				      		<option selected></option>
					        <option value="1">Todos as avaliações</option>
					        <option value="2">Nota de Avaliação Crescente</option>
					        <option value="3">Nota de Avaliação Decrescente</option>
				      	</select>
			      	</form>
			    </div>
			    <br><br>
			    <form method="post" action="cliente_especifico.php" action="listar_cliente_especifico.php">
		        	<label>Procurar um cliente especifico</label>
					<div class="form-group">
						<input type="text" class="form-control" name="campo" placeholder="Nome, Nota, Sinalizador, etc..." required/>
					</div>
					<button type="buttom" class="btn btn-primary" id="btn_pesquisar">Procurar</button>
					<br><br>
				</form>
	      	</div>
	      	<div class="col-md-9">
		        <table class="table">
					<thead class="thead-dark">
				    	<tr>
					      	<th scope="col">ID Avaliação</th>
					      	<th scope="col">Razão social</th>
					      	<th scope="col">Pessoa responsável</th>
					      	<th scope="col">Sinalizador</th>
					      	<th scope="col">Data em que se tornou cliente</th>
					      	<th scope="col">Realizou a avaliação</th>
					      	<th scope="col">Data da avaliação</th>
					      	<th scope="col">Nota da avaliação</th>
				    	</tr>
				  	</thead>
				  	<tbody id="lista">
					    
				  	</tbody>
				</table>			
		    </div>  	
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>