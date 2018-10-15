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
			function lista_clientes(){
				$.ajax({
					url: 'banco_clientes.php',
					success: function(data){
						$('#lista').html(data);
					}
				});
			}
			lista_clientes();     
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
	    	<div class="col-md-3"></div>
	      	<div class="col-md-6">
		        <table class="table">
					<thead class="thead-dark">
				    	<tr>
					      	<th scope="col">ID da empresa</th>
					      	<th scope="col">Nome da empresa</th>
					      	<th scope="col">Data em que se tornou cliente</th>
				    	</tr>
				  	</thead>
				  	<tbody id="lista">
					    
				  	</tbody>
				</table>			
		    </div>  
		    <div class="col-md-3"></div>	
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>